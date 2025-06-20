@extends('layout.admin')

@section('content')

<!-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-5"> -->
  
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-2 pt-2">

<!-- Total Users -->
    <div class="bg-indigo-600 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-users"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Total Users</p>
            <h2 class="text-3xl font-bold">{{ $totalUsers }}</h2>
        </div>
    </div>

    <!-- Active Users -->
    <div class="bg-green-500 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Active Users</p>
            <h2 class="text-3xl font-bold">{{ $activeUsers }}</h2>
        </div>
    </div>

    <!-- Inactive Users -->
    <div class="bg-yellow-500 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-user-clock"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Inactive Users</p>
            <h2 class="text-3xl font-bold">{{ $inactiveUsers }}</h2>
        </div>
    </div>

    <!-- Banned Users -->
    <div class="bg-red-600 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-user-slash"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Banned Users</p>
            <h2 class="text-3xl font-bold">{{ $bannedUsers }}</h2>
        </div>
    </div>

    <!-- Total Payment -->
    <div class="bg-yellow-500 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-coins"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Total Payment</p>
            <h2 class="text-3xl font-bold">{{ $totalPayment }} ৳</h2>
        </div>
    </div>

    <!-- Total Withdraw -->
    <div class="bg-green-700 text-white rounded-xl p-5 shadow-md flex justify-between items-center">
        <div class="text-4xl">
            <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="text-right">
            <p class="text-sm">Total Withdraw</p>
            <h2 class="text-3xl font-bold">{{ $totalWithdraw }} ৳</h2>
        </div>
    </div>
</div>

@endsection
