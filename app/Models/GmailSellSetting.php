<?php

// app/Models/GmailSellSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GmailSellSetting extends Model
{
    protected $fillable = ['recovery_gmail', 'password', 'limit', 'price', 'status'];
}

