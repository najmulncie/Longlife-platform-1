@extends('layout.user')

@section('content')
<div class="p-4">
    <h2 class="text-center text-xl font-bold mb-4">আমার ইনকাম সামারি</h2>

    <div class="space-y-3">
        <a href="/income/today" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-blue-500 text-xl"><i class="fas fa-trophy"></i></div>
                <div class="font-semibold">আজকের দিনের ইনকাম</div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </a>

        <a href="/income/yesterday" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-purple-500 text-xl"><i class="fas fa-trophy"></i></div>
                <div class="font-semibold">গতকালের ইনকাম</div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </a>

        <a href="/income/last-7-days" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-blue-400 text-xl"><i class="fas fa-trophy"></i></div>
                <div class="font-semibold">গত ৭ দিনের ইনকাম</div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </a>

        <a href="/income/last-30-days" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-yellow-500 text-xl"><i class="fas fa-trophy"></i></div>
                <div class="font-semibold">গত ৩০ দিনের ইনকাম</div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </a>

        <a href="/income/total" class="flex items-center justify-between bg-white rounded-xl shadow p-4">
            <div class="flex items-center space-x-3">
                <div class="text-pink-500 text-xl"><i class="fas fa-trophy"></i></div>
                <div class="font-semibold">এখন পর্যন্ত সর্বমোট ইনকাম</div>
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </a>
    </div>
</div>
@endsection
