<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class GmailSale extends Model
// {
//     protected $fillable = ['user_id', 'gmail_address', 'status'];

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmailSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gmail',
        'gmail_password',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
