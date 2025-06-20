<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance; // ধরুন ব্যালেন্স user টেবিলে আছে
        return view('user.wallet', compact('balance'));
    }

}
