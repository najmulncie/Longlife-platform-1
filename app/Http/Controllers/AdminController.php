<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixedCommissionSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Payment;
use App\Models\Withdraw;

class AdminController extends Controller
{

    // কমিশন সেটিংস দেখানোর মেথড
    public function editCommissions()
    {
        $commissions = FixedCommissionSetting::orderBy('generation')->get();
        return view('admin.fixed_commissions', compact('commissions'));
    }

    // কমিশন আপডেট করার মেথড
    public function updateCommissions(Request $request)
    {
        foreach ($request->amounts as $generation => $amount) {
            FixedCommissionSetting::updateOrCreate(
                ['generation' => $generation],
                ['amount' => $amount]
            );
        }

        return back()->with('success', 'কমিশন সেটিংস সফলভাবে আপডেট হয়েছে।');
    }

    public function editProfile()
{
    $admin = auth()->guard('admin')->user();
    return view('admin.profile', compact('admin'));
}

public function updateProfile(Request $request)
{
    $admin = auth()->guard('admin')->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id,
        'phone' => 'nullable|string|max:20',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('profile_photo')) {
        $image = $request->file('profile_photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/admins'), $imageName);
        $admin->profile_photo = 'uploads/admins/' . $imageName;
    }

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->phone = $request->phone;
    $admin->save();

    return back()->with('success', 'প্রোফাইল আপডেট সফল হয়েছে!');
}

public function showChangePasswordForm()
{
    return view('admin.change-password');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $admin = Auth::guard('admin')->user();

    if (!Hash::check($request->current_password, $admin->password)) {
        return back()->with('error', 'বর্তমান পাসওয়ার্ড সঠিক নয়!');
    }

    $admin->password = Hash::make($request->new_password);
    $admin->save();

    return back()->with('success', 'পাসওয়ার্ড সফলভাবে আপডেট হয়েছে!');
}



}
