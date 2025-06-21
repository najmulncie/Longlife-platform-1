<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BonusHistory;
use Illuminate\Support\Facades\Auth;


class GlobalBonusController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();

        $activeRefers = User::where('referrer_id', $user->id)
                            ->where('is_active', true)
                            ->get();

        $bonusHistories = BonusHistory::where('user_id', $user->id)->latest()->get();

        return view('project.global-bonus', [
            'activeRefers' => $activeRefers,
            'bonusHistories' => $bonusHistories,
            'required' => 15,
            'bonusAmount' => 600,
        ]);
    }


    
    public function achieve()
    {
        $user = Auth::user();

        $activeCount = User::where('referrer_id', $user->id)
                        ->where('is_active', true)
                        ->count();

        if ($activeCount >= 15) {
            // Bonus add
            BonusHistory::create([
                'user_id' => $user->id,
                'amount' => 600,
            ]);

            // Reset count (optional logic)
            // ...

            return redirect()->back()->with('success', '🎉 আপনি গ্লোবাল বোনাস অর্জন করেছেন!');
        }

        return redirect()->back()->with('error', 'আপনার দ্বিতীয় লেভেলে ১৫টি একটিভ রেফার নেই।');
    }

}
