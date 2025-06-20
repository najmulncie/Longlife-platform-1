<?php

namespace App\Http\Controllers;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Models\User;

class ReferralController extends Controller
{
    public function showLevel($level, Request $request)
{
    // শুধুমাত্র ১ থেকে ১০ পর্যন্ত লেভেল অনুমোদিত
    if ($level < 1 || $level > 10) {
        abort(404, 'Level not found');
    }

    $user = auth()->user();
    $search = $request->input('search');

    // সব রেফার করা ইউজারদের ঐ লেভেল অনুযায়ী বের করা
    $referrals = $this->getUsersAtLevel($user, $level);

    // যদি সার্চ ভ্যালু আসে তাহলে ফিল্টার করে শুধু ঐ refer code দেখাবে
    // যদি সার্চ ভ্যালু আসে তাহলে ফিল্টার করে শুধু ঐ refer code দেখাবে
if ($search) {
    $referrals = $referrals->filter(function ($ref) use ($search) {
        return stripos($ref->referral_code, $search) !== false;
    });
}


    return view('referrals.level', compact('referrals', 'level', 'search'));
}


public function showLevels()
{
    $user = auth()->user();

    $levelData = [];

    for ($level = 1; $level <= 10; $level++) {
        $members = $this->getUsersAtLevel($user, $level);
        $levelData[$level] = [
            'total' => $members->count(),
            'active' => $members->where('is_active', 1)->count(), // ফিক্স করা হয়েছে
        ];
    }

    return view('referrals.levels', compact('levelData'));
}



    private function getUsersAtLevel($user, $targetLevel)
    {
        $currentLevelUsers = collect([$user]);
        $nextLevelUsers = collect();

        for ($level = 1; $level <= $targetLevel; $level++) {
            $nextLevelUsers = User::whereIn('referred_by', $currentLevelUsers->pluck('id'))->get();
            $currentLevelUsers = $nextLevelUsers;
        }

        return $currentLevelUsers;
    }
}
