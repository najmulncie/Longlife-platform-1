<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Models\UserTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BalanceLog;




class TargetController extends Controller
{
    public function showTargets()
    {
        $user = auth()->user();
        $now = now();

        $targets = Target::all()->map(function ($target) use ($user, $now) {
            $duration = match ($target->type) {
                'daily' => 86400,     // 24 hours
                'weekly' => 604800,   // 7 days
                'monthly' => 2592000, // 30 days
                'one_time' => null,
                default => null,
            };

            $userTarget = UserTarget::where('user_id', $user->id)
                ->where('target_type', $target->type)
                ->latest()
                ->first();

            $needsNewTarget = false;

            if (!$userTarget) {
                $needsNewTarget = true;
            } else {
                if ($target->type !== 'one_time') {
                    $timePassed = $now->diffInSeconds($userTarget->start_time);

                    // ✅ নতুন Target লাগবে যদি আগেরটা claimed হয় বা মেয়াদ শেষ হয়ে যায়
                    if ($userTarget->claimed || $timePassed >= $duration) {
                        $needsNewTarget = true;
                    }
                }
            }

            // ✅ নতুন Target তৈরি
            if ($needsNewTarget) {
                $userTarget = UserTarget::create([
                    'user_id' => $user->id,
                    'target_type' => $target->type,
                    'claimed' => false,
                    'start_time' => now(),
                ]);
            }

            // ✅ Active referrals যেগুলো সময়ের মধ্যে করা হয়েছে
            $query = $user->referrals()->where('is_active', 1);
            if ($target->type !== 'one_time') {
                $query->where('created_at', '>=', $userTarget->start_time);
            }
            $activeRefs = $query->count();

            $timeLeft = $duration ? max(0, $duration - $now->diffInSeconds($userTarget->start_time)) : null;

            $progress = $target->required_active_refs > 0
                ? min(100, ($activeRefs / $target->required_active_refs) * 100)
                : 0;

            $isEligible = $activeRefs >= $target->required_active_refs && !$userTarget->claimed;

            return [
                'type' => $target->type,
                'reward' => $target->reward_amount,
                'required' => $target->required_active_refs,
                'achieved' => $activeRefs,
                'progress' => $progress,
                'time_left' => $timeLeft,
                'can_claim' => $isEligible,   // ✅ View-এ বাটন শর্তসাপেক্ষে দেখানোর জন্য
            ];
        });

        return view('user.targets', compact('targets'));
    }


    public function claimBonus($type)
    {
        $user = Auth::user();  // অথবা auth()->user()
        $now = now();

        $target = Target::where('type', $type)->firstOrFail();

        $userTarget = UserTarget::where('user_id', $user->id)
            ->where('target_type', $type)
            ->where('claimed', false)
            ->latest()
            ->first();

        if (!$userTarget) {
            return back()->with('error', 'টার্গেট পাওয়া যায়নি।');
        }

        $query = $user->referrals()->where('is_active', 1);
        if ($type !== 'one_time') {
            $query->where('created_at', '>=', $userTarget->start_time);
        }
        $activeRefs = $query->count();

        if ($activeRefs < $target->required_active_refs) {
            return back()->with('error', 'টার্গেট এখনো পূর্ণ হয়নি।');
        }

        // বোনাস ক্লেইমের জন্য
        $userTarget->update(['claimed' => true]);

        // ইউজারের ব্যালেন্সে টাকা যোগ
        $user->balance += $target->reward_amount;
        $user->save();

        // BalanceLog এ রেকর্ড
        BalanceLog::create([
            'user_id' => $user->id,
            'amount' => $target->reward_amount,
            // 'type' => 'target_bonus',
            'details' => 'Claimed target bonus for ' . $type . ' target',
        ]);

        return redirect()->back()->with('success', 'অভিনন্দন! আপনার বোনাসের টাকা সফলভাবে ব্যালেন্সে যুক্ত হয়েছে।');
    }
}
