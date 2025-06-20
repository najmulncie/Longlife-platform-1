<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GmailSellSetting;
use App\Models\GmailSale;  // সেমিকোলন মিসিং ছিলো এখানে, ঠিক করা হয়েছে

class GmailSubmissionController extends Controller
{
    public function gmailSellForm()
    {
        $setting = GmailSellSetting::first();
        return view('user.gmail_sell', compact('setting'));
    }

    public function submit(Request $request)  // <-- এখানে নাম submit
    {
        $setting = GmailSellSetting::first();

        if (!$setting || $setting->status == 0) {
            return back()->with('error', 'Gmail Sell Project বর্তমানে বন্ধ আছে।');
        }

        $request->validate([
            'gmail' => 'required|email|unique:gmail_sales,gmail',
            'gmail_password' => 'required|string',
        ]);

        // ডাটাবেজ এন্ট্রি করার কোড এখানে রাখবে
       GmailSale::create([
    'user_id' => auth()->id(),
    'gmail' => $request->gmail,
    'gmail_password' => $request->gmail_password, // এটা নিশ্চিতভাবে দিন
    'status' => 'pending',
]);


        return back()->with('success', 'আপনার Gmail সফলভাবে জমা হয়েছে এবং পেন্ডিং অবস্থায় আছে।');
    }
}
