<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SimOperator;

class SimOperatorController extends Controller
{
    public function index()
    {
        $operators = SimOperator::all();
        return view('admin.project.sim_operators.index', compact('operators'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sim_operators,name'
        ]);

        SimOperator::create(['name' => $request->name]);

        return back()->with('success', 'সিম অপারেটর যুক্ত হয়েছে');
    }

    public function destroy(SimOperator $simOperator)
    {
        $simOperator->delete();
        return back()->with('success', 'সিম অপারেটর মুছে ফেলা হয়েছে');
    }
}