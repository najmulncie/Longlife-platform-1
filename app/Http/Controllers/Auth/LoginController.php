<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // এটা অবশ্যই থাকতে হবে
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $login_input = $request->login;

        $user = User::where('email', $login_input)
            ->orWhere('mobile', $login_input)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/dashboard'); // সফল হলে ড্যাশবোর্ডে যাবে
        }

        return back()->withErrors([
            'login' => 'Mobile/Gmail or password is incorrect.',
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
