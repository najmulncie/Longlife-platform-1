<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\PaymentLog;

class VoucharBalanceController extends Controller
{
    public function index()
    {
        return view('layout.vouchar-balance');
    }

   public function initiatePayment(Request $request)
    {
        $amount = $request->input('amount');

        $payload = [
            "cus_name" => auth()->user()->name ?? "Unknown",
            "cus_email" => auth()->user()->email ?? "demo@example.com",
            "redirect_url" => route('payment.verify'),
            "cancel_url" => "https://longlifepassive.com/cancel",
            "webhook_url" => route('payment.webhook'),
            "metadata" => [
                "phone" => auth()->user()->phone ?? "01765142802",
                "user_id" => auth()->id(),
            ],
            "amount" => (string) $amount
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.zinipay.com/v1/payment/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => array(
                'zini-api-key: 391575d26509016d81b3f463935db449a2a553e9b4bd36d9',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json(['error' => 'cURL Error: ' . $err], 500);
        }

        $data = json_decode($response, true);
        
        if (isset($data['payment_url'])) {
            return response()->json(['payment_url' => $data['payment_url']]);
        } else {
            return response()->json(['error' => 'পেমেন্ট শুরু করা যায়নি', 'debug' => $data], 500);
        }
    }



    // public function success()
    // {
    //     return view('voucher.success');
    // }

    // public function cancel()
    // {
    //     return view('voucher.cancel');
    // }

    // public function webhook(Request $request)
    // {
    //     \Log::info('Voucher webhook received', $request->all());

    //     // এখানে আপনি DB তে পেমেন্টের স্ট্যাটাস আপডেট করতে পারেন
    //     return response()->json(['status' => 'received']);
    // }


   public function verifyPayment(Request $request)
    {
        $invoiceId = $request->query('invoiceId');

        if (!$invoiceId) {
            return view('layout.cancel', ['message' => 'Invoice ID পাওয়া যায়নি।']);
        }

        $apiKey = "391575d26509016d81b3f463935db449a2a553e9b4bd36d9";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'zini-api-key' => $apiKey,
        ])->post('https://api.zinipay.com/v1/payment/verify', [
            'invoiceId' => $invoiceId,
            'apiKey' => $apiKey
        ]);

        $paymentData = $response->json();

        // Check payment status
        if ($paymentData && isset($paymentData['status']) && $paymentData['status'] === 'COMPLETED') {

            $userId = $paymentData['metadata']['user_id'] ?? null;
            $amount = $paymentData['amount'] ?? 0;

            // Prevent duplicate payments
            if (PaymentLog::where('invoice_id', $invoiceId)->exists()) {
                return view('layout.success', [
                    'amount' => $amount,
                    'message' => 'আপনার পেমেন্ট ইতোমধ্যে সফল হয়েছে'
                ]);
            }

            if ($userId && $amount > 0) {
                $user = User::find($userId);

                if ($user) {
                    // Update balance
                    $user->voucher_balance += $amount;
                    $user->save();

                    // Log payment
                    PaymentLog::create([
                        'invoice_id' => $invoiceId,
                        'user_id' => $userId,
                        'amount' => $amount,
                    ]);

                    return view('layout.success', [
                        'data' => $paymentData,
                        'amount' => $amount
                    ]);
                }
            }

            $message = "ব্যবহারকারী খুঁজে পাওয়া যায়নি বা এমাউন্ট শূন্য।";
            return view('layout.cancel', compact('message'));
        }

        $message = $paymentData['message'] ?? 'Unknown error';
        return view('layout.cancel', compact('message'));
    }

    // ✅ ব্যালেন্স API
    public function getBalance()
    {
        return response()->json(['balance' => auth()->user()->voucher_balance]);
    }


    public function webhookHandler(Request $request)
    {
        $payload = $request->all();

        if (!isset($payload['data']) || $payload['status'] !== 'success') {
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        $data = $payload['data'];
        $transactionId = $data['transactionId'] ?? null;
        $amount = $data['amount'] ?? 0;
        $phone = $data['metadata']['phone'] ?? null;
        $invoiceId = $data['invoiceId'] ?? null;

        if (!$transactionId || !$phone) {
            return response()->json(['message' => 'Missing transaction data'], 400);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // যদি একই transaction আগে থেকেই থাকে, তাহলে স্কিপ করুন
        if (Transaction::where('transaction_id', $transactionId)->exists()) {
            return response()->json(['message' => 'Already processed'], 200);
        }

        // ✅ Transaction save করুন
        Transaction::create([
            'user_id' => $user->id,
            'transaction_id' => $transactionId,
            'invoice_id' => $invoiceId,
            'amount' => $amount,
            'status' => 'success',
            'payment_method' => 'zinipay',
            'phone' => $phone,
            'response_data' => $data,
        ]);

        // ✅ ব্যালেন্স আপডেট করুন
        $user->increment('voucher_balance', $amount);

        return response()->json(['message' => 'Payment processed'], 200);
    }
}
