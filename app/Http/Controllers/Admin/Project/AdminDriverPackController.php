<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverPack;
use App\Models\SimOperator;
use App\Models\DriverPackPurchase;
use App\Models\BalanceLog;
use App\Models\Commission;
use App\Models\User;


class AdminDriverPackController extends Controller
{
    public function index()
    {
        $packs = DriverPack::with('simOperator')->get();
        return view('admin.project.driver_packs.index', compact('packs'));
    }

    public function create()
    {
        $operators = SimOperator::all();
        return view('admin.project.driver_packs.create', compact('operators'));
    }

    public function store(Request $request)
    {
        $request->validate([
             'sim_operator_id' => 'required|exists:sim_operators,id',
            'offer_title' => 'required',
            'validity' => 'required|string',
            'price' => 'required|integer',
            'cashback' => 'required|integer',
        ]);

        DriverPack::create([
            'sim_operator_id' => $request->sim_operator_id,
            'offer_title' => $request->offer_title,
            'validity' => $request->validity,
            'price' => $request->price,
            'cashback' => $request->cashback,
        ]);

        return redirect()->route('admin.driver-packs.index')->with('success', 'অফার সফলভাবে যুক্ত হয়েছে।');
    }


    public function edit(DriverPack $driverPack)
    {
        $operators = SimOperator::all();
        return view('admin.project.driver_packs.edit', compact('driverPack', 'operators'));
    }

    public function update(Request $request, DriverPack $driverPack)
    {
        $request->validate([
            'sim_operator_id' => 'required|exists:sim_operators,id',
            'offer_title' => 'required',
            'price' => 'required|integer',
            'cashback' => 'required|integer',
        ]);

        $driverPack->update([
            'sim_operator_id' => $request->sim_operator_id,
            'offer_title' => $request->offer_title,
            'price' => $request->price,
            'cashback' => $request->cashback,
        ]);

        return redirect()->route('admin.driver-packs.index')->with('success', 'অফার আপডেট হয়েছে।');
    }


    public function destroy(DriverPack $driverPack)
    {
        $driverPack->delete();

        return redirect()->route('admin.driver-packs.index')->with('success', 'অফার মুছে ফেলা হয়েছে।');
    }

   public function approve($id)
{
    $purchase = DriverPackPurchase::findOrFail($id);

    if ($purchase->status === 'approved') {
        return back()->with('error', 'এই প্যাকেজটি ইতোমধ্যে এপ্রুভ হয়েছে।');
    }

    $user = $purchase->user;

    $user->balance += $purchase->cashback;
    $user->save();

    BalanceLog::create([
        'user_id' => $user->id,
        'amount' => $purchase->cashback,
        'type' => 'driver_pack',
        'description' => 'Driver Pack থেকে ক্যাশব্যাক',
    ]);

    $this->distributeGenerationIncome($user->id, $purchase->id);

  
    $purchase->status = 'approved';
    $purchase->save();

    return back()->with('success', 'Driver Pack সফলভাবে এপ্রুভ হয়েছে এবং ইনকাম পাঠানো হয়েছে।');
}


    private function distributeGenerationIncome($userId, $purchaseId)
{
    $amounts = [5, 2, 1, 1, 0.5]; // level-wise amount
    $currentUser = \App\Models\User::find($userId); 
    $fromUser = $currentUser;

    for ($level = 1; $level <= 5; $level++) {
        $referrer = $currentUser->referrer;

        if (!$referrer) {
            break;
        }

        $referrer->balance += $amounts[$level - 1];
        $referrer->save();

        // Balance log
        \App\Models\BalanceLog::create([
            'user_id' => $referrer->id,
            'amount' => $amounts[$level - 1],
            'type' => 'generation_income',
            'description' => "{$level}ম জেনারেশন ইনকাম (Driver Pack)",
        ]);

        // Commission log
        \App\Models\Commission::create([
            'from_user_id' => $fromUser->id,
            'to_user_id' => $referrer->id,
            'amount' => $amounts[$level - 1],
            'level' => $level,
        ]);

        // পরবর্তী রেফারারে যাও
        $currentUser = $referrer;
    }
}


    public function userDriverPackRequest(Request $request)
    {
        $query = DriverPackPurchase::with('user');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhere('phone_number', 'like', "%{$search}%");
        }

        $purchases = $query->latest()->paginate(25);
            return view('admin.project.driver_packs.user-request', compact('purchases'));
        }

}
