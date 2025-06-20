<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GmailSale;  // GmailSale মডেল ইম্পোর্ট করো

class UserGmailSaleController extends Controller
{
    public function history(Request $request, $status = null)
    {
        $user = auth()->user();

        $status = $status ?? 'pending';  // যদি status না পাও, তাহলে pending ধরে নাও

        // ইউজারের gmail sales গুলো status অনুযায়ী নিয়ে আসা
        $gmailSales = GmailSale::where('user_id', $user->id)
                        ->where('status', $status)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('user.gmail_sales_history', compact('gmailSales', 'status'));
    }
}
