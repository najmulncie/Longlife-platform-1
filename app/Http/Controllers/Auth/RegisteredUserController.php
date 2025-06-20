<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    // Show registration form
    public function create()
    {
        return view('auth.register');
    }

    // Handle registration POST
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'regex:/^01[3-9]\d{8}$/', 'unique:users,mobile'],
            'email' => ['required', 'email', 'regex:/^[\w.+\-]+@gmail\.com$/i', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable', 'string', 'exists:users,referral_code'], // ইনপুট ফিল্ড হবে referral_code
        ]);

        // রেফারার ইউজার
        $referrer = null;
        if ($request->referral_code) {
            $referrer = User::where('referral_code', $request->referral_code)->first();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),

            // নিজের ইউনিক রেফারেল কোড তৈরি
            'referral_code' => strtoupper(Str::random(6)),

            // যিনি রেফার করেছেন তার ID, কিন্তু এবার 'referred_by' ফিল্ডে
            'referred_by' => $referrer ? $referrer->id : null,
        ]);

        // লগইন করাও
        auth()->login($user);

        return redirect()->route('dashboard');
    }
}