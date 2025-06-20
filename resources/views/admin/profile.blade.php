@extends('layout.admin') <!-- আপনার admin layout -->

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white rounded-xl shadow-md p-6">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">এডমিন প্রোফাইল আপডেট করুন</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 text-sm p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-gray-700 font-medium mb-1">নাম</label>
            <input type="text" name="name" value="{{ $admin->name }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">ইমেইল</label>
            <input type="email" name="email" value="{{ $admin->email }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">মোবাইল নাম্বার</label>
            <input type="text" name="phone" value="{{ $admin->phone }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">প্রোফাইল পিকচার</label>
            @if($admin->profile_photo)
                <div class="mb-2">
                    <img src="{{ asset($admin->profile_photo) }}" class="w-24 h-24 rounded-full object-cover border" alt="Admin Photo">
                </div>
            @endif
            <input type="file" name="profile_photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition">আপডেট করুন</button>
        </div>
    </form>
</div>
@endsection
