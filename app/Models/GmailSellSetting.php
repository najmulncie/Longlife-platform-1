<?php

// app/Models/GmailSellSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GmailSellSetting extends Model
{
    protected $fillable = ['password', 'limit', 'price', 'status'];
}

