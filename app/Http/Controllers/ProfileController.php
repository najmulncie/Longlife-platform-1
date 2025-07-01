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
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();

            // সরাসরি public ফোল্ডারে সেভ করছি
            $file->move(public_path('profile_photos'), $filename);

            // পুরাতন ছবি ডিলিট করুন
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }

            // ডেটাবেজে path সেভ করছি
            $user->profile_photo = 'profile_photos/' . $filename;
        }
        $user->save();
        
        return redirect()->back()->with('success', 'প্রোফাইল আপডেট হয়েছে!');
    }
}
