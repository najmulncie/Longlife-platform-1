<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WithdrawMethod;
use App\Models\WithdrawType;
use App\Models\Setting;

class WithdrawSettingController extends Controller
{
    public function index()
    {
        return view('admin.withdraw.settings', [
            'methods' => WithdrawMethod::all(),
            'types' => WithdrawType::all(),
            'min' => Setting::getValue('withdraw_min_amount'),
            'max' => Setting::getValue('withdraw_max_amount'),
            'charge' => Setting::getValue('withdraw_charge_percent'),
        ]);
    }

    public function storeMethod(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:withdraw_methods,name']);
        WithdrawMethod::create(['name' => $request->name]);
        return back()->with('success', 'Withdraw method added!');
    }

    public function storeType(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:withdraw_types,name']);
        WithdrawType::create(['name' => $request->name]);
        return back()->with('success', 'Withdraw type added!');
    }

    public function storeConfig(Request $request)
    {
        $request->validate([
            'min' => 'required|numeric|min:0',
            'max' => 'required|numeric|gt:min',
            'charge' => 'required|numeric|min:0|max:100',
        ]);

        Setting::updateOrCreate(['key' => 'withdraw_min_amount'], ['value' => $request->min]);
        Setting::updateOrCreate(['key' => 'withdraw_max_amount'], ['value' => $request->max]);
        Setting::updateOrCreate(['key' => 'withdraw_charge_percent'], ['value' => $request->charge]);

        return back()->with('success', 'Withdraw configuration updated!');
    }
}
