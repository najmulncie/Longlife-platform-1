<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SimOperator;
use App\Models\DriverPackPurchase;
use App\Models\BalanceLog;
use Illuminate\Support\Facades\Auth;


class DriverPackController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $simOperators = SimOperator::with('driverPacks')->get()->map(function ($operator) {
            // name থেকে slug মত key
            $key = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $operator->name));
            $operator->key = $key;
            return $operator;
        });

        // packages JSON তৈরিতে key ব্যবহার করো:
        $packagesJson = $simOperators->mapWithKeys(function ($operator) {
            return [
                $operator->key => $operator->driverPacks->map(function ($pack) {
                    return [
                        'title' => $pack->offer_title,
                        'validity' => $pack->validity,
                        'cashback' => $pack->cashback,
                        'price' => '৳' . $pack->price,
                    ];
                })->values()->toArray(),
            ];
        })->toArray();


        return view('project.driver-pack.index', compact('simOperators', 'packagesJson', 'user'));
    }


    public function purchase(Request $request)
    {
        $validated = $request->validate([
            'sim_operator' => 'required|string',
            'offer_title' => 'required|string',
            'price' => 'required|numeric',
            'cashback' => 'required|numeric',
            'phone_number' => 'required|string',
            
        ]);

        $user = auth()->user();
        $price = (int) $request->price;

        if ($user->voucher_balance < $price) {
            return response()->json(['error' => 'ভাউচার ব্যালেন্স যথেষ্ট নয়'], 422);
        }

        $user->voucher_balance -= $request->price;
        // $user->balance += $request->cashback;
        $user->save();

        $purchase = DriverPackPurchase::create([
            'user_id' => $user->id,
            'sim_operator' => $request->sim_operator,
            'offer_title' => $request->offer_title,
            'validity' => $request->validity,
            'price' => $request->price,
            'cashback' => $request->cashback,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json(['success' => 'ক্রয় সফল হয়েছে', 'purchase' => $purchase]);
    }

   

public function history()
{
    $user = Auth::user();

    $purchases = DriverPackPurchase::where('user_id', $user->id)
                  ->orderBy('created_at', 'desc')
                  ->get();
    // ভিউতে পাঠানো
    return view('project.driver-pack.driver_pack_history', compact('purchases'));
}

}
