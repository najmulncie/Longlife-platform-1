@extends('layout.user')

@section('content')
<div class="p-4">

    {{-- ব্যালেন্স কার্ড --}}
    <div class="bg-yellow-400 rounded-xl p-6 shadow-md flex items-center justify-between mb-6">
        <div class="flex items-center space-x-4">
            <div class="text-white text-5xl">
                <i class="fas fa-wallet"></i>
            </div>
            <div>
                <div class="text-white text-3xl font-bold">{{ number_format(Auth::user()->balance, 2) }}৳</div>
                <div class="text-white text-sm mt-1">বর্তমান ব্যালেন্স</div>
            </div>
        </div>
    </div>

    {{-- মেনু বক্স --}}
    <div class="space-y-4">

        {{-- ব্যালেন্স যুক্ত করুন --}}
        <a href="/update" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-green-500 text-xl"><i class="fas fa-plus-circle"></i></div>
                <div class="font-semibold">ব্যালেন্স যুক্ত করুন</div>
            </div>
            <!-- <div class="text-gray-400 text-xl">→</div> -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>
        </a>

        {{-- ইনকাম হিস্ট্রি দেখুন --}}
        <a href="/income-history" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-blue-500 text-xl"><i class="fas fa-history"></i></div>
                <div class="font-semibold">ইনকাম হিস্ট্রি দেখুন</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>

        </a>

        {{-- ইনকাম সামারি দেখুন --}}
        <a href="{{ route('income.summary') }}" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-indigo-500 text-xl"><i class="fas fa-chart-bar"></i></div>
                <div class="font-semibold">ইনকাম সামারি দেখুন</div>
            </div>
           <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>

        </a>


        {{-- ব্যালেন্স উত্তোলন করুন --}}
<a href="{{ route('withdraw.form') }}" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
    <div class="flex items-center space-x-3">
        <div class="text-red-500 text-xl"><i class="fas fa-money-bill-wave"></i></div>
        <div class="font-semibold">ব্যালেন্স উত্তোলন করুন</div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
    </svg>
</a>

{{-- উত্তোলনের হিস্ট্রি দেখুন --}}
<a href="{{ route('withdraw.history') }}" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
    <div class="flex items-center space-x-3">
        <div class="text-pink-500 text-xl"><i class="fas fa-receipt"></i></div>
        <div class="font-semibold">উত্তোলনের হিস্ট্রি দেখুন</div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
    </svg>
</a>

        {{-- ব্যালেন্স ট্রান্সফার করুন --}}
        <a href="/update" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-orange-500 text-xl"><i class="fas fa-exchange-alt"></i></div>
                <div class="font-semibold">ব্যালেন্স ট্রান্সফার করুন</div>
            </div>
           <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>

        </a>

        {{-- ব্যালেন্স ট্রান্সফার হিস্ট্রি দেখুন --}}
        <a href="/update" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-purple-500 text-xl"><i class="fas fa-list"></i></div>
                <div class="font-semibold">ট্রান্সফার হিস্ট্রি দেখুন</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
</svg>

        </a>

    </div>
</div>
@endsection
