<?php

namespace App\Http\Controllers;

use App\Models\WithdrawMethod;
use App\Models\WithdrawType;
use App\Models\Setting;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    /**
     * Show the withdraw form page.
     */
    public function create()
    {
        $methods = WithdrawMethod::all();
        $types = WithdrawType::all();
        $min = Setting::getValue('withdraw_min_amount');
        $max = Setting::getValue('withdraw_max_amount');
        $charge = Setting::getValue('withdraw_charge_percent');
        $balance = Auth::user()->balance;

        return view('user.withdraw.form', compact('methods', 'types', 'min', 'max', 'charge', 'balance'));
    }

    /**
     * Store a new withdraw request.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Check if account is active
        if ($user->is_active != 1) {
            return redirect()->route('dashboard')->with('error', '⚠️ আপনার একাউন্টটি অ্যাক্টিভ নয়! অনুগ্রহ করে একাউন্টটি এক্টিভ করুন।');
        }

        // Settings values
        $min = Setting::getValue('withdraw_min_amount');
        $max = Setting::getValue('withdraw_max_amount');
        $charge = Setting::getValue('withdraw_charge_percent');

        // Validation
        $request->validate([
            'method' => 'required|exists:withdraw_methods,id',
            'type'   => 'required|exists:withdraw_types,id',
            'number' => ['required', 'regex:/^01[0-9]{9}$/'],
            'amount' => "required|numeric|min:$min|max:$max"
        ], [
            'number.regex' => 'সঠিক বাংলাদশি মোবাইল নম্বর দিন (যেমন: 01XXXXXXXXX)',
        ]);

        // Charge Calculation
        $chargeAmount = ($request->amount * $charge) / 100;
        $totalDeduct = $request->amount + $chargeAmount;

        // Check balance
        if ($user->balance < $totalDeduct) {
            return back()->with('error', '⚠️ আপনার একাউন্টে পর্যাপ্ত ব্যালেন্স নেই।');
        }

        // Deduct balance
        $user->balance -= $totalDeduct;
        $user->save();

        // Create withdraw request
        Withdraw::create([
            'user_id'   => $user->id,
            'method_id' => $request->method,
            'type_id'   => $request->type,
            'number'    => $request->number,
            'amount'    => $request->amount,
            'charge'    => $chargeAmount,
            'total'     => $totalDeduct,
            'status'    => 'pending',
        ]);

        // Redirect with message
        return redirect()->route('dashboard')->with('success', '✅ আপনার উইথড্র অনুরোধ সফলভাবে গ্রহণ করা হয়েছে! অনুগ্রহ করে অনুমোদনের জন্য অপেক্ষা করুন।');
    }

    public function history(Request $request)
{
    $status = $request->get('status', 'pending'); // default = pending

    $withdraws = Withdraw::where('user_id', auth()->id())
        ->where('status', $status)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.withdraw.history', compact('withdraws', 'status'));
}

}
