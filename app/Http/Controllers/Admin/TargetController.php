<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Target;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::all();
        return view('admin.targets.index', compact('targets'));
    }

    public function update(Request $request, $id)
    {
        $target = Target::findOrFail($id);

        $request->validate([
            'required_active_refs' => 'required|integer|min:0',
            'reward_amount' => 'required|numeric|min:0',
        ]);

        $target->update([
            'required_active_refs' => $request->required_active_refs,
            'reward_amount' => $request->reward_amount,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->back()->with('success', 'Target updated successfully!');
    }
}
