@extends('layout.admin')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">নতুন লিডারশিপ লেভেল তৈরি করুন</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.leadership-levels.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">লেভেল নাম</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">পুরস্কার (৳)</label>
            <input type="number" name="reward_amount" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">টার্গেট কতজন</label>
            <input type="number" name="target_count" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-medium">টার্গেট টাইপ</label>
            <select name="target_type" class="w-full border p-2 rounded" required>
                <option value="direct">ডিরেক্ট রেফার</option>
                <option value="level_1">১ম লেভেল অর্জনকারী</option>
                <option value="level_2">২য় লেভেল অর্জনকারী</option>
                <option value="level_3">৩য় লেভেল অর্জনকারী</option>
            </select>
        </div>

        <div>
            <label class="block font-medium">লেভেল নাম্বার</label>
            <input type="number" name="level_number" class="w-full border p-2 rounded" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">সংরক্ষণ করুন</button>
        </div>
    </form>
</div>
@endsection
