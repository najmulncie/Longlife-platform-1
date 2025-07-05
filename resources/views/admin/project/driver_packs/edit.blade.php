@extends('layout.admin')
@section('title', 'ড্রাইভার অফার এডিট করুন')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-center mb-6">✏️ ড্রাইভার অফার এডিট</h2>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.driver-packs.update', $driverPack->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="sim_operator_id" class="block text-gray-700 font-bold mb-2">সিম অপারেটর</label>
            <select name="sim_operator_id" id="sim_operator_id" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="">একটি অপারেটর বেছে নিন</option>
                @foreach($operators as $operator)
                    <option value="{{ $operator->id }}" {{ $driverPack->sim_operator_id == $operator->id ? 'selected' : '' }}>
                        {{ $operator->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="offer_title" class="block text-gray-700 font-bold mb-2">অফার টাইটেল</label>
            <input type="text" name="offer_title" id="offer_title" value="{{ old('offer_title', $driverPack->offer_title) }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">মূল্য (৳)</label>
            <input type="number" name="price" id="price" value="{{ old('price', $driverPack->price) }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="validity" class="block text-gray-700 font-bold mb-2">সময়কাল (যেমন: 30 দিন)</label>
            <input type="text" name="validity" id="validity" value="{{ old('validity', $driverPack->validity ?? '') }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>


        <div class="mb-4">
            <label for="cashback" class="block text-gray-700 font-bold mb-2">ক্যাশব্যাক (৳)</label>
            <input type="number" name="cashback" id="cashback" value="{{ old('cashback', $driverPack->cashback) }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                💾 আপডেট করুন
            </button>
            <a href="{{ route('admin.driver-packs.index') }}" class="text-blue-600 hover:underline">← ফিরে যান</a>
        </div>
    </form>
</div>
@endsection
