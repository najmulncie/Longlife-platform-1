<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
   public function index(Request $request)
{
    $query = $request->input('query');

    $users = User::query();

    if ($query) {
        $users = $users->where('name', 'like', "%{$query}%")
                       ->orWhere('mobile', 'like', "%{$query}%")
                       ->orWhere('email', 'like', "%{$query}%")
                       ->orWhere('referral_code', 'like', "%{$query}%");
    }

    $users = $users->paginate(10);

    return view('admin.users.index', compact('users', 'query'));
}

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

//     public function update(Request $request, $id)
// {
//     $user = User::findOrFail($id);

//     $user->name = $request->name;
//     $user->email = $request->email;
//     $user->phone = $request->phone;
//     $user->balance = $request->balance;
//     $user->is_active = $request->is_active;

//     // ✅ নতুন মেসেজ সেট করা
//     $user->admin_message = $request->admin_message;

//     // পাসওয়ার্ড পরিবর্তন (যদি দেয়া হয়)
//     if ($request->password) {
//         $user->password = Hash::make($request->password);
//     }

//     $user->save();

//     return redirect()->route('admin.users')->with('success', 'User updated successfully');
// }

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // যদি ফর্ম থেকে আসছে তাহলে update করবো
    if ($request->filled('name')) {
        $user->name = $request->name;
    }

    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    if ($request->filled('phone')) {
        $user->phone = $request->phone;
    }

    if ($request->filled('balance')) {
        $user->balance = $request->balance;
    }

    if ($request->has('is_active')) {
        $user->is_active = $request->is_active;
    }

    if ($request->filled('admin_message')) {
        $user->admin_message = $request->admin_message;
    }

    // পাসওয়ার্ড থাকলে hash করে সেট করবো
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.users')->with('success', 'User updated successfully');
}



    public function ban($id) {
        $user = User::findOrFail($id);
        $user->is_active = 0;
        $user->save();
        return back()->with('success', 'User banned');
    }

    public function unban($id) {
        $user = User::findOrFail($id);
        $user->is_active = 1;
        $user->save();
        return back()->with('success', 'User unbanned');
    }

    // app/Http/Controllers/Admin/AdminUserController.php

public function showMessageForm($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.message', compact('user'));
}

public function sendMessage(Request $request, $id)
{
    $request->validate([
        'admin_message' => 'required|string'
    ]);

    $user = User::findOrFail($id);
    $user->admin_message = $request->admin_message;
    $user->save();

    return back()->with('success', 'মেসেজ সফলভাবে পাঠানো হয়েছে');
}


public function bannedUsers()
{
    // যাদের is_active=0 (বা যেভাবে তোমরা ban handle করো)
    $bannedUsers = User::where('is_active', 0)->get();

    return view('admin.users.banned', compact('bannedUsers'));
}

// app/Http/Controllers/AdminUserController.php

public function inactiveUsers()
{
    $inactiveUsers = User::where('is_active', 0)->get(); // 0 মানে Inactive
    return view('admin.users.inactive', compact('inactiveUsers'));
}

// App\Http\Controllers\AdminUserController.php

public function activeUsers()
{
    $activeUsers = User::where('is_active', 1)->get();

    return view('admin.users.active', compact('activeUsers'));
}


}
