<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommissionSetting;

class CommissionSettingController extends Controller
{
    public function index()
    {
        $settings = CommissionSetting::orderBy('level')->get();
        return view('admin.commissions.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->percentages as $level => $percentage) {
            CommissionSetting::updateOrCreate(
                ['level' => $level],
                ['percentage' => $percentage]
            );
        }

        return redirect()->back()->with('success', 'Commission settings updated successfully.');
    }
}
