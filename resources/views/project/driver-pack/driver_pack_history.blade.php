@extends('layout.user')

@section('title', 'ড্রাইভার প্যাকেজ হিস্ট্রি')

@section('content')
<style>
  body {
    background-color: #f3f4f6; /* light gray */
  }
</style>

<div class="p-4">
    <!-- 🔙 Back Button -->
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="text-blue-600 hover:text-blue-800 font-semibold">
            ← ফিরে যান
        </a>
    </div>

    <!-- 🏷️ Title -->
    <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">
        🚗 ড্রাইভার প্যাকেজ ক্রয়ের হিস্ট্রি
    </h2>

    @if($purchases->isEmpty())
        <p class="text-center text-gray-500">আপনি এখনও কোন ড্রাইভার প্যাকেজ ক্রয় করেননি।</p>
    @else
        <!-- 🧾 Purchase Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($purchases as $purchase)
        

            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-3 border border-gray-200">
                <h3 class="text-lg font-bold text-indigo-700 mb-1">{{ $purchase->offer_title }}</h3>

                <p class="text-sm text-gray-700 mb-1">⏰ সময়কালঃ 
                    <span class="font-medium">
                        {{ $purchase->validity }} দিন  
                    </span>
                    </p>

                <p class="text-sm text-green-600 font-semibold mb-1">🎁 ক্যাশব্যাকঃ ৳ {{ $purchase->cashback }}</p>

                <p class="text-xl font-extrabold text-blue-600 mt-1 mb-3">৳{{ $purchase->price }}</p>

                <div class="text-sm text-gray-600 space-y-1">
                    <p><strong>সিম অপারেটর:</strong> {{ ucfirst($purchase->sim_operator) }}</p>
                    <p><strong>নাম্বার:</strong> {{ $purchase->phone_number }}</p>
                    <p>
                        <strong>স্ট্যাটাস:</strong>
                        @if($purchase->status === 'approved')
                            <span class="text-green-600 font-semibold">✔️ Approved</span>
                        @elseif($purchase->status === 'pending')
                            <span class="text-yellow-600 font-semibold">⏳ Pending</span>
                        @else
                            <span class="text-red-600 font-semibold">❌ {{ ucfirst($purchase->status) }}</span>
                        @endif
                    </p>
                    <p><strong>তারিখ:</strong> {{ $purchase->created_at->format('d M Y, h:i A') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
