<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BalanceLog;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addBalance($amount)
    {
        $user = auth()->user(); // বা যেকোনো user
        
        // ইউজারের ব্যালেন্স বাড়াও
        $user->balance += $amount;
        $user->save();

        // ব্যালেন্স লগ সংরক্ষণ করো
        BalanceLog::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'income',
        ]);
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $users = User::where('referral_code', 'LIKE', "%{$query}%")
        ->orWhere('mobile', 'LIKE', "%{$query}%")
        ->orWhere('email', 'LIKE', "%{$query}%")
        ->orWhere('name', 'LIKE', "%{$query}%")
        ->paginate(20); // pagination লাগালে

    return view('admin.users.index', compact('users', 'query'));
}

public function dismissMessage(Request $request)
{
    $user = Auth::user();
    $user->admin_message = null;
    $user->save();

    return back()->with('success', 'মেসেজ মুছে ফেলা হয়েছে।');
}


}