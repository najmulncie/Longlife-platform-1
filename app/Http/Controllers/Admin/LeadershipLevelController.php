<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipLevel;
use Illuminate\Http\Request;

class LeadershipLevelController extends Controller
{
    // ✅ লিস্ট দেখাবে
    public function index()
    {
        $levels = LeadershipLevel::orderBy('level_number')->get();
        return view('admin.leadership_levels.index', compact('levels'));
    }

    // ✅ নতুন ফর্ম দেখাবে
    public function create()
    {
        return view('admin.leadership_levels.create');
    }

    // ✅ ডাটাবেজে সংরক্ষণ করবে
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'reward_amount' => 'required|numeric|min:0',
            'target_count' => 'required|integer|min:1',
            'target_type' => 'required|in:direct,level_1,level_2,level_3',
            'level_number' => 'required|integer|min:1|unique:leadership_levels,level_number',
        ]);

        LeadershipLevel::create($request->all());

        return redirect()->route('admin.leadership-levels.index')
                         ->with('success', 'লিডারশিপ লেভেল সফলভাবে তৈরি হয়েছে।');
    }

    // ✅ একক লেভেল দেখাবে (প্রয়োজনে)
    public function show(LeadershipLevel $leadershipLevel)
    {
        return view('admin.leadership_levels.show', compact('leadershipLevel'));
    }

    // ✅ এডিট ফর্ম দেখাবে
    public function edit(LeadershipLevel $leadershipLevel)
    {
        return view('admin.leadership_levels.edit', compact('leadershipLevel'));
    }

    // ✅ আপডেট করবে
    public function update(Request $request, LeadershipLevel $leadershipLevel)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'reward_amount' => 'required|numeric|min:0',
            'target_count' => 'required|integer|min:1',
            'target_type' => 'required|in:direct,level_1,level_2,level_3',
            'level_number' => 'required|integer|min:1|unique:leadership_levels,level_number,' . $leadershipLevel->id,
        ]);

        $leadershipLevel->update($request->all());

        return redirect()->route('admin.leadership-levels.index')
                         ->with('success', 'লেভেল আপডেট সফল হয়েছে।');
    }

    // ✅ ডিলিট করবে
    public function destroy(LeadershipLevel $leadershipLevel)
    {
        $leadershipLevel->delete();

        return redirect()->route('admin.leadership-levels.index')
                         ->with('success', 'লেভেল সফলভাবে ডিলিট হয়েছে।');
    }
}
