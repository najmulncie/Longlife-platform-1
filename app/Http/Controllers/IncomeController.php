<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\BalanceLog;
use App\Models\Commission;

class IncomeController extends Controller
{
    public function today()
    {
        $start = Carbon::today();
        $end = Carbon::tomorrow();
        return $this->generateIncomeView($start, $end, 'আজকের ইনকাম');
    }

    public function yesterday()
    {
        $start = Carbon::yesterday();
        $end = Carbon::today();
        return $this->generateIncomeView($start, $end, 'গতকালের ইনকাম');
    }

    public function last7()
    {
        $start = Carbon::now()->subDays(7);
        $end = Carbon::now();
        return $this->generateIncomeView($start, $end, 'গত ৭ দিনের ইনকাম');
    }

    public function last30()
    {
        $start = Carbon::now()->subDays(30);
        $end = Carbon::now();
        return $this->generateIncomeView($start, $end, 'গত ৩০ দিনের ইনকাম');
    }

    public function total()
    {
        $user = Auth::user();

        // Main balance income
        $balanceIncome = $user->balanceLogs()->sum('amount');

        // Bonus income
        $bonusIncome = DB::table('bonus_histories')
            ->where('user_id', $user->id)
            ->sum('amount');

        $income = $balanceIncome + $bonusIncome;

        return view('user.income-card', [
            'income' => $income,
            'label' => 'সর্বমোট ইনকাম',
            'date' => now()->format('d M Y, h:i A')
        ]);
    }


    private function generateIncomeView($start, $end, $label)
    {
        $user = Auth::user();

        // Main balance_logs income
        $balanceIncome = $user->balanceLogs()
            ->whereBetween('created_at', [$start, $end])
            ->sum('amount');

        // Global bonus income from bonus_histories
        $bonusIncome = DB::table('bonus_histories')
            ->where('user_id', $user->id)
            ->whereBetween('created_at', [$start, $end])
            ->sum('amount');

        $income = $balanceIncome + $bonusIncome;

        return view('user.income-card', [
            'income' => $income,
            'label' => $label,
            'date' => now()->format('d M Y, h:i A')
        ]);
    }

    public function index()
    {
        $commissions = Commission::where('to_user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.income_history', compact('commissions'));
    }

}