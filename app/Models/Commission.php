<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['from_user_id', 'to_user_id', 'level', 'amount'];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    // App\Models\Commission.php

public function getMessageAttribute()
{
    return "অভিনন্দন! আপনি {$this->level} তম লেভেল থেকে {$this->amount} টাকা কমিশন পেয়েছেন।";
}

}
