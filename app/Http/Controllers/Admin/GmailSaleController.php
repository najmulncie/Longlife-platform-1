<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GmailSale;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GmailSalesExport;
use App\Models\BalanceLog;

class GmailSaleController extends Controller
{

    public function index()
    {
        // ডাটাবেজ থেকে gmail_sales ডেটা নিয়ে আসা
        $gmailSales = GmailSale::orderBy('created_at', 'desc')->get();

        // ভিউতে ডেটা পাঠানো
        return view('admin.gmail_sales.index', compact('gmailSales'));
    }



    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,checked,rejected,completed',
        ]);

        $sale = GmailSale::findOrFail($id);
        $previousStatus = $sale->status;

        $sale->status = $request->status;
        $sale->save();

        // ✅ যদি নতুন করে completed করা হয়
        if ($request->status === 'completed' && $previousStatus !== 'completed') {
            $setting = \App\Models\GmailSellSetting::first();

            if ($setting && $sale->user) {
                $amount = $setting->price;
                $user = $sale->user;

                // ব্যালেন্স আপডেট করুন
                $user->balance += $amount;
                $user->save();

                // ✅ Balance log insert করুন
                BalanceLog::create([
                    'user_id' => $user->id,
                    'amount' => $amount,
                ]);
            }
        }

        return back()->with('success', 'Status updated successfully.');
    }


    // Sales by status
    public function pending()
    {
        $gmailSales = GmailSale::where('status', 'pending')->latest()->get();
        return view('admin.gmail_sales.pending', compact('gmailSales'));
    }

    // Show all checked Gmail sales
    public function checked()
    {
        $gmailSales = GmailSale::where('status', 'checked')->latest()->get();
        return view('admin.gmail_sales.checked', compact('gmailSales'));
    }

    // Show all rejected Gmail sales
    public function rejected()
    {
        $gmailSales = GmailSale::where('status', 'rejected')->latest()->get();
        return view('admin.gmail_sales.rejected', compact('gmailSales'));
    }

    // Show all completed Gmail sales
    public function completed()
    {
        $gmailSales = GmailSale::where('status', 'completed')->latest()->get();
        return view('admin.gmail_sales.completed', compact('gmailSales'));
    }

    // app/Http/Controllers/Admin/GmailSaleController.php

// public function bulkAction(Request $request)
// {
//     $ids = $request->input('ids', []);
//     $action = $request->input('action');

//     if (!in_array($action, ['checked', 'rejected', 'completed'])) {
//         return back()->with('error', 'Invalid action selected.');
//     }

//     if (!empty($ids)) {
//         GmailSale::whereIn('id', $ids)->update(['status' => $action]);
//         return back()->with('success', 'Selected Gmail sales updated successfully.');
//     }

//     return back()->with('error', 'No Gmail selected.');
// }


public function bulkAction(Request $request)
{
    $ids = $request->input('ids', []);
    $action = $request->input('action');

    if (!in_array($action, ['checked', 'rejected', 'completed'])) {
        return back()->with('error', 'Invalid action selected.');
    }

    if (empty($ids)) {
        return back()->with('error', 'No Gmail selected.');
    }

    $setting = \App\Models\GmailSellSetting::first();
    $amount = $setting ? $setting->price : 0;

    foreach ($ids as $id) {
        $sale = \App\Models\GmailSale::find($id);

        if ($sale && $sale->status !== $action) {
            $previousStatus = $sale->status;
            $sale->status = $action;
            $sale->save();

            // ✅ যদি নতুনভাবে completed করা হয়
            if ($action === 'completed' && $previousStatus !== 'completed') {
                $user = $sale->user;
                if ($user && $amount > 0) {
                    $user->balance += $amount;
                    $user->save();

                    \App\Models\BalanceLog::create([
                        'user_id' => $user->id,
                        'amount' => $amount,
                
                    ]);
                }
            }
        }
    }

    return back()->with('success', 'Selected Gmail sales updated successfully.');
}

public function export()
{
    return Excel::download(new GmailSalesExport, 'gmail_sales.xlsx');
}


}
