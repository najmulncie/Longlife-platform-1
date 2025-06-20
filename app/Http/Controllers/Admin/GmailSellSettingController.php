<?php

// app/Http/Controllers/Admin/GmailSellSettingController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GmailSellSetting;
use Illuminate\Http\Request;

class GmailSellSettingController extends Controller
{
    // public function index()
    // {
    //     $setting = GmailSellSetting::first();
    //     return view('admin.gmail_setting', compact('setting'));
    // }

    public function index()
{
    $setting = \App\Models\GmailSellSetting::first();

    // যদি রেকর্ড না থাকে, তাহলে নতুন ফাঁকা অবজেক্ট তৈরি করুন যাতে Blade এ error না দেয়
    if (!$setting) {
        $setting = new \App\Models\GmailSellSetting();
    }

    return view('admin.gmail_setting', compact('setting'));
}


    public function update(Request $request)
    {
        $data = $request->validate([
            'password' => 'required',
            'limit' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        GmailSellSetting::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Settings Updated');
    }

    public function toggle()
    {
        $setting = GmailSellSetting::first();
        $setting->status = !$setting->status;
        $setting->save();

        return response()->json(['status' => $setting->status]);
    }
}
