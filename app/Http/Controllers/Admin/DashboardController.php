<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\WithdrawRequest; 

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         return view('admin.dashboard', [
//             'totalUsers'    => User::count(),
//             'activeUsers'   => User::where('is_active', 1)->count(),
//             'inactiveUsers' => User::where('is_active', 0)->count(),
//            'bannedUsers' => User::where('is_active', 0)->count(),

//         ]);
//     }
// }


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WithdrawRequest; 

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers    = User::count();
        $activeUsers   = User::where('is_active', 1)->count();
        $inactiveUsers = User::where('is_active', 0)->count();

        // যদি আলাদা banned status থাকে, ধরুন 'is_banned' নামে, তাহলে এভাবে করবেন:
        $bannedUsers = User::where('is_active', 0)->count();

        // যদি bannedUsers আলাদা না থাকে, এবং inactive মানেই banned ধরে নেন,
        // তাহলে শুধু $bannedUsers = $inactiveUsers; করতে পারেন।

        // ঠিক মতো টোটাল পেমেন্ট হিসাব (২৫০ করে গুন)
        $totalPayment = $activeUsers * 250;

        // টোটাল উইথড্র শুধুমাত্র approved withdrawal থেকে
        $totalWithdraw = WithdrawRequest::where('status', 'approved')->sum('amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'bannedUsers',
            'totalPayment',
            'totalWithdraw'
        ));
    }
}
