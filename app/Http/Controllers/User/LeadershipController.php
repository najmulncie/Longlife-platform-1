<?php

namespace App\Http\Controllers\User;

use App\Models\LeadershipLevel;
use App\Models\UserLeadership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadershipController extends Controller
{
    public function index()
    {
        $leadershipLevels = LeadershipLevel::orderBy('level_number')->get();
        return view('user.leadership', compact('leadershipLevels'));
    }


public function claim($id)
{
    $level = LeadershipLevel::findOrFail($id);
    $user = auth()->user();

    // Check eligibility
    $userCount = 0;

    if ($level->level_number == 1) {
        $userCount = $user->referrals()->where('is_active', 1)->count();
    } else {
        $userCount = $user->referrals()
            ->whereHas('userLeaderships', function ($q) use ($level) {
                $q->whereHas('leadershipLevel', function ($q2) use ($level) {
                    $q2->where('level_number', $level->level_number - 1);
                });
            })->count();
    }

    if ($userCount < $level->target_count) {
        return back()->with('error', 'আপনি এখনো এই লিডারশিপের জন্য যোগ্য নন।');
    }

    // Already claimed?
    if (UserLeadership::where('user_id', $user->id)->where('leadership_level_id', $id)->exists()) {
        return back()->with('error', 'আপনি এই লিডারশিপটি ইতিমধ্যেই ক্লেইম করেছেন।');
    }

    // Update balance
    $user->balance += $level->reward_amount;
    $user->save();

    // Save to UserLeadership table
    UserLeadership::create([
        'user_id' => $user->id,
        'leadership_level_id' => $id,
        'is_claimed' => true,
        'claimed_at' => now()
    ]);

    // ✅ Save to BalanceLog table
    \App\Models\BalanceLog::create([
        'user_id' => $user->id,
        'amount' => $level->reward_amount,
        'details' => 'Claimed leadership bonus for level: ' . $level->name,
    ]);

    return back()->with('success', $level->name . ' লিডারশিপ ক্লেইম সফল হয়েছে!');
}

}