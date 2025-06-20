<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawRequestController extends Controller
{
    // ✅ Pending Requests
    public function indexPending()
    {
        $withdraws = Withdraw::with('user', 'method', 'type')
            ->where('status', 'pending')
            ->latest()
            ->get();
        return view('admin.withdraw.pending', compact('withdraws'));
    }

    // ✅ Approved Requests
    public function indexApproved()
    {
        $withdraws = Withdraw::with('user', 'method', 'type')
            ->where('status', 'approved')
            ->latest()
            ->get();
        return view('admin.withdraw.approved', compact('withdraws'));
    }

    // ✅ Rejected Requests
    public function indexRejected()
    {
        $withdraws = Withdraw::with('user', 'method', 'type')
            ->where('status', 'rejected')
            ->latest()
            ->get();
        return view('admin.withdraw.rejected', compact('withdraws'));
    }

    // ✅ Approve
    public function approve($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->status = 'approved';
        $withdraw->save();

        return back()->with('success', 'উইথড্র রিকোয়েস্ট অ্যাপ্রুভ করা হয়েছে।');
    }

    // ✅ Reject with Balance Refund
    public function reject($id)
    {
        DB::beginTransaction();
        try {
            $withdraw = Withdraw::with('user')->findOrFail($id);

            if ($withdraw->status !== 'pending') {
                return back()->with('error', 'এই রিকোয়েস্টটি ইতোমধ্যে প্রসেস করা হয়েছে।');
            }

            $user = $withdraw->user;
            if (!$user) {
                return back()->with('error', 'ইউজার খুঁজে পাওয়া যায়নি।');
            }

            $user->balance += $withdraw->amount;
            $user->save();

            $withdraw->status = 'rejected';
            $withdraw->save();

            DB::commit();
            return back()->with('success', 'উইথড্র রিকোয়েস্ট বাতিল করা হয়েছে এবং টাকা ইউজারের ব্যালেন্সে ফেরত দেয়া হয়েছে।');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'সমস্যা হয়েছে: ' . $e->getMessage());
        }
    }
}
