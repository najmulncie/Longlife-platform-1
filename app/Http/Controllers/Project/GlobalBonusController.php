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
        $userId = $user->id;
    
        // Level 1 referrals
        $level1Users = User::where('referred_by', $userId)->pluck('id');
    
        // সক্রিয় Level 2 referrals
        $activeLevel2 = User::whereIn('referred_by', $level1Users)
                            ->where('is_active', true)
                            ->get();
    
        // মোট বোনাস গ্রহণ সংখ্যা
        $bonusHistoriesCount = BonusHistory::where('user_id', $userId)
                                          ->where('amount', 600)
                                          ->count();
    
        // এখন নতুন একটিভ রেফার বের করুন, যাদের জন্য বোনাস পাওয়া হয়নি
        $claimedRefersCount = $bonusHistoriesCount * 20; 
    
        $newActiveRefers = $activeLevel2->slice($claimedRefersCount);
    
        // View তে পাঠানো ডেটা
        return view('project.global-bonus', [
            'activeRefers' => $newActiveRefers,  // Progress bar এর জন্য নতুন একটিভ রেফার
            'bonusHistories' => BonusHistory::where('user_id', $userId)->latest()->get(),
            'required' => 20,
            'bonusAmount' => 600,
        ]);
    }



    public function achieve()
    {
        $user = Auth::user();
    
        // Level 1 users referred by current user
        $level1Users = User::where('referred_by', $user->id)->pluck('id');
    
        // মোট বোনাসের হিস্ট্রি
        $bonusHistoriesCount = BonusHistory::where('user_id', $user->id)
                                          ->where('amount', 600)
                                          ->count();
    
        // Claim করা বোনাস অনুসারে কতজন রেফার গোনা হবে
        $claimedRefersCount = $bonusHistoriesCount * 20;
    
        $activeLevel2 = User::whereIn('referred_by', $level1Users)
                            ->where('is_active', true)
                            ->get();
    
        // নতুন active refers যারা এখনো বোনাসের আওতায় পড়েনি, slice করে নিচ্ছি
        $newActiveRefers = $activeLevel2->slice($claimedRefersCount);
    
    
        $activeCount = $newActiveRefers->count();
    
        $required = 20; 
    
        if ($activeCount < $required) {
            return redirect()->back()->with('error', 'আপনার দ্বিতীয় লেভেলে অন্তত ২টি নতুন একটিভ রেফার থাকতে হবে।');
        }
    
        // নতুন বোনাস তৈরি করুন
        BonusHistory::create([
            'user_id' => $user->id,
            'amount' => 600,
        ]);
    
        return redirect()->back()->with('success', '🎉 অভিনন্দন! আপনি গ্লোবাল বোনাস অর্জন করেছেন!');
    }

}
