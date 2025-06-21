<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusHistory extends Model
{
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    public function bonusHistories()
    {
        return $this->hasMany(BonusHistory::class);
    }

}
