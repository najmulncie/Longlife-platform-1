@extends('layout.admin')
@section('title', 'নতুন অফার যুক্ত করুন')

@section('content')
        <div class="container mx-auto mt-6">
            <h2 class="text-xl font-bold mb-4 text-center">➕ ড্রাইভার অফার তৈরি করুন</h2>

            <form action="{{ route('admin.driver-packs.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow-md">
                @csrf
                <div>
            <label>সিম অপারেটর</label>
            <select name="sim_operator_id" class="w-full border p-2 rounded" required>
                <option value="">একটি অপারেটর বেছে নিন</option>
                @foreach($operators as $operator)
                    <option value="{{ $operator->id }}"
                        @if(old('sim_operator_id', $driverPack->sim_operator_id ?? '') == $operator->id) selected @endif>
                        {{ $operator->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>অফার নাম</label>
            <input type="text" name="offer_title" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="validity" class="block text-gray-700 font-bold mb-2">সময়কাল (যেমন: 30 দিন)</label>
            <input type="text" name="validity" id="validity" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label>মূল্য (৳)</label>
            <input type="number" name="price" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label>ক্যাশব্যাক (৳)</label>
            <input type="number" name="cashback" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">সংরক্ষণ করুন</button>
    </form>
</div>
@endsection
