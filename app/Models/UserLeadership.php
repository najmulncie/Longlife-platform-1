<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLeadership extends Model
{
    protected $fillable = [
        'user_id',
        'leadership_level_id',
        'is_claimed',      // 0 = এখনো ক্লেইম করেনি, 1 = ক্লেইম করেছে
        'claimed_at',      // কখন ক্লেইম করেছে
    ];

    protected $casts = [
        'is_claimed' => 'boolean',
        'claimed_at' => 'datetime',
    ];

    // ইউজার সম্পর্ক
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // লিডারশিপ লেভেল সম্পর্ক
    public function level()
    {
        return $this->belongsTo(LeadershipLevel::class, 'leadership_level_id');
    }


 // ... আগের কোড থাকলে থাকবে

    public function leadershipLevel()
    {
        return $this->belongsTo(LeadershipLevel::class);
    }
}

