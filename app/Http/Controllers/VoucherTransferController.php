<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VoucherTransfer;
use Auth;

class VoucherTransferController extends Controller
{
    public function transfer(Request $request)
    {
        $request->validate([
            'method' => 'required|in:নগদ,বিকাশ,রকেট',
            'number' => 'required|digits:11',
            'amount' => 'required|numeric|min:200|max:250000',
        ]);

        $user = Auth::user();
        $amount = $request->amount;
        $charge = $amount * 0.02;
        $received = $amount - $charge;

        if ($user->voucher_balance < $amount) {
            return response()->json(['error' => 'পর্যাপ্ত ব্যালেন্স নেই'], 400);
        }

        $user->voucher_balance -= $amount;
        $user->save();

        VoucherTransfer::create([
            'user_id' => $user->id,
            'method' => $request->method,
            'number' => $request->number,
            'amount' => $amount,
            'charge' => $charge,
            'received' => $received,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'ট্রান্সফার অনুরোধ গ্রহণ করা হয়েছে!',
            'new_balance' => $user->voucher_balance
        ]);
    }
    
    public function voucherTransferHistory(Request $request)
    {
        // $transfers = VoucherTransfer::where('user_id', auth()->id())
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $query = VoucherTransfer::where('user_id', auth()->id());

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('number', 'like', "%{$search}%")
                ->orWhere('method', 'like', "%{$search}%");
            });
        }

        $transfers = $query->orderBy('created_at', 'desc')->get();


        return view('layout.voucher_transfer_history', compact('transfers'));
    }

}
