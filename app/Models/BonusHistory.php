<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusHistory extends Model
{
    protected $fillable = ['user_id', 'amount'];
    
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }

    public function bonusHistories()
    {
        return $this->hasMany(BonusHistory::class);
    }


}
