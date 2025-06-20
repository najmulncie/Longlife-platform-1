@extends('layout.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-xl shadow-md p-6">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">পাসওয়ার্ড পরিবর্তন করুন</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 text-sm p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 text-sm p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-1">বর্তমান পাসওয়ার্ড</label>
            <input type="password" name="current_password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">নতুন পাসওয়ার্ড</label>
            <input type="password" name="new_password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">নতুন পাসওয়ার্ড নিশ্চিত করুন</label>
            <input type="password" name="new_password_confirmation" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">পাসওয়ার্ড আপডেট করুন</button>
        </div>
    </form>
</div>
@endsection
