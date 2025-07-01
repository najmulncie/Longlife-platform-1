<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✅ Fillable attributes
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'profile_photo',
        'referred_by',       // যিনি রেফার করেছেন তার user_id
        'referral_code',     // এই ইউজারের নিজস্ব ইউনিক রেফারেল কোড
        'balance',
        'last_seen',
        'voucher_balance'
    ];

    // ✅ Hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Cast attributes
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ✅ যিনি এই ইউজারকে রেফার করেছেন
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    // ✅ এই ইউজার যাদের রেফার করেছে
    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    // ✅ বিকল্প নাম: uplink (উপরের লেভেলের ইউজার)
    public function upline()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    // ✅ ব্যালেন্স লগ রিলেশন
    public function balanceLogs()
    {
        return $this->hasMany(BalanceLog::class);
    }

    // ✅ ব্যালেন্স যোগ করার ফাংশন (অটো লগ ইনসার্ট করে)
    public function addBalance($amount)
    {
        $this->balance += $amount;
        $this->save();

        $this->balanceLogs()->create([
            'amount' => $amount,
        ]);
    }

    // ✅ ইউজার কোন কোন Leadership অর্জন করেছে
    public function userLeaderships()
    {
        return $this->hasMany(UserLeadership::class);
    }

    // ✅ ইউজার একটি নির্দিষ্ট Leadership লেভেল অর্জন করেছে কিনা (উদাহরণ ফাংশন)
    public function hasAchievedLevel($level_id)
    {
        return $this->userLeaderships()->where('leadership_level_id', $level_id)->exists();
    }

    // ✅ ইউজার কোনো লেভেল অর্জনের রেকর্ড (ডায়নামিক রিটার্ন)
    public function getLeadershipLevel($level_id)
    {
        return $this->userLeaderships()->where('leadership_level_id', $level_id)->first();
    }

    public function gmailSales()
    {
        return $this->hasMany(\App\Models\GmailSale::class);
    }

    protected $casts = [
        'last_seen' => 'datetime',
    ];

    public function isOnline()
    {
        return $this->last_seen !== null && $this->last_seen->gt(now()->subMinutes(1));
    }

}
