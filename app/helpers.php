<?php

// app/helpers.php (ফাইল না থাকলে তৈরি করুন এবং composer.json এ autoload করুন)
use App\Models\Setting;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}
