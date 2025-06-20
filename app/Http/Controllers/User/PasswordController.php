<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('user.change-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'পুরাতন পাসওয়ার্ড ভুল!']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে!');
    }
}
