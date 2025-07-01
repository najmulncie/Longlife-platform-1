@extends('layout.user') <!-- আপনার যেই লেআউট সেটা দিন -->

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-semibold mb-6 text-center">প্রোফাইল আপডেট করুন</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

      
        <div class="mb-4 flex flex-col items-center">
            <img src="{{ asset(Auth::user()->profile_photo) }}" class="w-24 h-24 rounded-full object-cover mb-2" alt="Profile photo">
            <!-- <img src=" {{ asset(Auth::user()->profile_photo) }}" alt="প্রোফাইল ছবি" width="100"> -->

            <input type="file" name="profile_photo" class="text-sm text-gray-600">
        </div>

        <div class="mb-4">
            <label class="block font-medium">নাম</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">মোবাইল নম্বর</label>
            <input type="text" name="mobile" value="{{ Auth::user()->mobile }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gmail</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">আপডেট করুন</button>
        </div>
    </form>
</div>
@endsection
