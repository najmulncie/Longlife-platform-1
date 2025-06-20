<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadershipLevel extends Model
{
    use HasFactory;

    // ✅ Fillable attributes
    protected $fillable = [
        'name',             // লিডারশিপ লেভেলের নাম (যেমন: ব্রোঞ্জ, সিলভার)
        'reward_amount',    // পুরস্কারের এমাউন্ট (যেমন: ২০০ টাকা)
        'target_count',     // কতজন রেফার লাগবে এই লেভেল পেতে
        'target_type',      // টার্গেট কী টাইপের: 'direct', 'level_1', 'level_2', 'level_3'
        'level_number',     // এইটা কোন নাম্বার লেভেল (১, ২, ৩, ৪)
    ];

    // ✅ এই লেভেল কোন কোন ইউজার অর্জন করেছে
    public function userLeaderships()
    {
        return $this->hasMany(UserLeadership::class);
    }
}
