<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTarget extends Model
{
    protected $fillable = ['user_id', 'target_type', 'start_time', 'claimed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
