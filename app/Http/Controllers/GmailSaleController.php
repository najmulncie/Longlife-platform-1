<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GmailSale;

class GmailSaleController extends Controller
{
    // Show all pending Gmail sales
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
}
