<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\CommissionSetting;
use App\Models\Commission;

class CommissionHelper
{
    public static function distribute($user, $amount)
    {
        $referrer = $user->referrer;
        $level = 1;

        while ($referrer && $level <= 10) {
            $setting = CommissionSetting::where('level', $level)->first();
            if ($setting) {
                $commissionAmount = ($amount * $setting->percentage) / 100;

                // যুক্ত করো রেফারারের ব্যালেন্সে
                $referrer->increment('balance', $commissionAmount);

                // কমিশন হিস্টোরি সংরক্ষণ করো
                Commission::create([
                    'from_user_id' => $user->id,
                    'to_user_id'   => $referrer->id,
                    'level'        => $level,
                    'amount'       => $commissionAmount,
                ]);
            }

            $referrer = $referrer->referrer;
            $level++;
        }
    }
}
