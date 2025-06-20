<?php

// app/Http/Controllers/PaymentSettingController.php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $settings = PaymentSetting::all();
        return view('admin.payment_settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.payment_settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'number' => 'required',
            'description' => 'nullable',
        ]);

        PaymentSetting::create($request->only('method', 'number', 'description'));

        return redirect()->route('payment-settings.index')->with('success', 'Payment method added.');
    }

    public function edit(PaymentSetting $paymentSetting)
    {
        return view('admin.payment_settings.edit', compact('paymentSetting'));
    }

    public function update(Request $request, PaymentSetting $paymentSetting)
    {
        $request->validate([
            'method' => 'required',
            'number' => 'required',
            'description' => 'nullable',
        ]);

        $paymentSetting->update($request->only('method', 'number', 'description'));

        return redirect()->route('payment-settings.index')->with('success', 'Payment method updated.');
    }

    public function destroy(PaymentSetting $paymentSetting)
    {
        $paymentSetting->delete();

        return redirect()->route('payment-settings.index')->with('success', 'Payment method deleted.');
    }
}
