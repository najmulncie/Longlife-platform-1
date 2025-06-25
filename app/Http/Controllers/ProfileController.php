<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;

        if ($request->hasFile('profile_photo')) {
            // পুরাতন ছবি ডিলিট করলে ভালো হয়
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

        // ফাইল সেভ করা হচ্ছে public ডিরেক্টরিতে
        $path = $request->file('profile_photo')->store('profile_photos', 'public');

        // path সেভ করা হচ্ছে
        $user->profile_photo = $path;
        $user->save();

        }
        return redirect()->back()->with('success', 'প্রোফাইল আপডেট হয়েছে!');
    }
}
