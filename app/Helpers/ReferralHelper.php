<?php

// app/Helpers/ReferralHelper.php
namespace App\Helpers;

use App\Models\User;
use App\Models\FixedCommissionSetting;
use App\Models\Transaction;

class ReferralHelper
{
    public static function distributeFixedActivationCommission($user)
    {
        $upline = $user->referrer_id;
        for ($i = 1; $i <= 10; $i++) {
            if (!$upline) break;

            $commission = FixedCommissionSetting::where('generation', $i)->value('amount');
            if ($commission && $commission > 0) {
                $refUser = User::find($upline);
                if ($refUser) {
                    $refUser->increment('balance', $commission);

                    // Optional: add a transaction record
                    Transaction::create([
                        'user_id' => $refUser->id,
                        'amount' => $commission,
                        'type' => 'activation_commission',
                        'details' => "Generation $i commission from user ID {$user->id}",
                    ]);

                    $upline = $refUser->referrer_id;
                } else {
                    break;
                }
            }
        }
    }
}
