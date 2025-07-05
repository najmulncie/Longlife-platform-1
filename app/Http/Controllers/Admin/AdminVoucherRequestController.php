<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherTransfer;

class AdminVoucherRequestController extends Controller
{
    public function index()
    {
        $transfers = VoucherTransfer::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.voucher_requests.index', compact('transfers'));
    }

    public function updateStatus($id, $status)
    {
        $transfer = VoucherTransfer::findOrFail($id);
        
        if ($status === 'rejected') {
            $user = $transfer->user; 
            $user->voucher_balance += $transfer->amount;
            $user->save();
        }

        $transfer->status = $status;
        $transfer->save();

        return redirect()->back()->with('success', "Transfer marked as $status.");
    }
}
