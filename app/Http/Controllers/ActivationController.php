<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivationRequest;
use App\Models\PaymentSetting;
use App\Models\User;
use App\Models\FixedCommissionSetting;
use App\Models\ReferralCommission;
use Illuminate\Support\Facades\DB;

class ActivationController extends Controller
{
    // ✅ অ্যাক্টিভেশন ফর্ম দেখানো
    public function showForm()
    {
        $methods = PaymentSetting::all();
        return view('user.activate', compact('methods'));
    }

    // ✅ ইউজার রিকোয়েস্ট সাবমিট করলে
    public function submitRequest(Request $request)
    {
        $request->validate([
            'method' => 'required|string',
            'user_number' => 'required|string',
            'transaction_id' => 'required|string',
            // 'screenshot' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'user_number.required' => 'মোবাইল নম্বর দেওয়া বাধ্যতামূলক।',
            'transaction_id' => 'ট্রান্সজেকশন আইডি দেওয়া বাধ্যতামূলক।',
        ]);

        // চেক করা ইউজারের কোনো পেন্ডিং রিকোয়েস্ট আছে কিনা
        $existing = ActivationRequest::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            return back()->with('error', 'আপনার একটি রিকুয়েস্ট ইতোমধ্যে পেন্ডিং রয়েছে। অনুগ্রহ করে এপ্রুভ বা রিজেক্ট হওয়া পর্যন্ত অপেক্ষা করুন।');
        }

        // // ✅ স্ক্রিনশট ফাইল সেভ করা
        $imageName = null;
        if ($request->hasFile('screenshot')) {
            $imageName = time() . '.' . $request->screenshot->extension();
            $request->screenshot->move(public_path('uploads/activation_screenshots'), $imageName);
        }
        


        // ✅ রিকোয়েস্ট তৈরি করা
        ActivationRequest::create([
            'user_id' => auth()->id(),
            'method' => $request->method,
            'user_number' => $request->user_number,
            'transaction_id' => $request->transaction_id,
            'screenshot' => $imageName,
            'status' => 'pending',
        ]);

        return redirect()->route('user.activation.success')->with('success', 'আপনার অ্যাক্টিভেশন রিকুয়েস্ট সফলভাবে জমা হয়েছে। অনুগ্রহ করে এডমিনের অনুমোদনের জন্য অপেক্ষা করুন।');
    }

    // ✅ এডমিন ইউজারকে অ্যাক্টিভ করে এবং কমিশন বিতরণ করে
    public function approve($id)
    {
        $request = ActivationRequest::findOrFail($id);
        $user = $request->user;

        DB::transaction(function () use ($user, $request) {
            // ✅ ইউজার অ্যাক্টিভ করা
            $user->update(['is_activated' => true]);

            // ✅ 10 generation commission বিতরণ
            $upline = $user->referred_by;
            for ($generation = 1; $generation <= 10; $generation++) {
                if (!$upline) break;

                $uplineUser = User::find($upline);
                if (!$uplineUser) break;

                $fixedAmount = FixedCommissionSetting::where('generation', $generation)->value('amount') ?? 0;

                if ($fixedAmount > 0) {
                    $uplineUser->increment('balance', $fixedAmount);

                    ReferralCommission::create([
                        'user_id' => $uplineUser->id,
                        'from_user_id' => $user->id,
                        'generation' => $generation,
                        'amount' => $fixedAmount,
                        'type' => 'activation',
                    ]);
                }

                $upline = $uplineUser->referred_by;
            }

            // ✅ রিকোয়েস্ট স্ট্যাটাস আপডেট
            $request->update(['status' => 'approved']);
        });

        return back()->with('success', 'অ্যাকাউন্ট অ্যাক্টিভ এবং রেফার কমিশন বিতরণ সম্পন্ন হয়েছে।');
    }

    // ✅ এডমিন রিকোয়েস্ট রিজেক্ট করলে
    public function reject($id)
    {
        $request = ActivationRequest::findOrFail($id);
        $request->update(['status' => 'rejected']);

        return back()->with('success', 'রিকুয়েস্টটি রিজেক্ট করা হয়েছে। ইউজার এখন আবার রিকুয়েস্ট পাঠাতে পারবে।');
    }
}
