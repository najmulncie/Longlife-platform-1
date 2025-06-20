<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ActivationRequest;
use Illuminate\Http\Request;
use App\Models\FixedCommissionSetting;
use App\Models\Commission;

class AdminActivationController extends Controller
{
  

// Pending Requests
public function pending()
{
    $requests = ActivationRequest::where('status', 'pending')->latest()->get();
    return view('admin.activation_requests.pending', compact('requests'));
}

// Approved Requests
public function approved()
{
    $requests = ActivationRequest::where('status', 'approved')->latest()->get();
    return view('admin.activation_requests.approved', compact('requests'));
}

// Rejected Requests
public function rejected()
{
    $requests = ActivationRequest::where('status', 'rejected')->latest()->get();
    return view('admin.activation_requests.rejected', compact('requests'));
}



public function approve($id)
{
    $request = ActivationRequest::findOrFail($id);
    $request->status = 'approved';
    $request->save();

    $user = $request->user;
    $user->is_active = true;
    $user->save();

    // কমিশন বিতরণ শুরু
    $upline = $user->referred_by;
    for ($generation = 1; $generation <= 10; $generation++) {
        if (!$upline) break;

        $uplineUser = User::find($upline);
        if (!$uplineUser) break;

        $fixedAmount = FixedCommissionSetting::where('generation', $generation)->value('amount') ?? 0;

        if ($fixedAmount > 0) {
            
            // $uplineUser->increment('balance', $fixedAmount);

            $uplineUser->addBalance($fixedAmount);

            // হিস্ট্রিতে যোগ করো
            Commission::create([
    'from_user_id' => $user->id,
    'to_user_id' => $uplineUser->id,
    'level' => $generation,
    'amount' => $fixedAmount,
    'type' => 'activation',
]);

        }

        $upline = $uplineUser->referred_by;
    }

    return back()->with('success', 'Account activated and commissions distributed.');
}

public function reject($id)
{
    $request = ActivationRequest::findOrFail($id);
    $request->status = 'rejected';
    $request->save();

    return back()->with('error', 'Request rejected.');
}

}
