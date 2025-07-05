@extends('layout.user')
@section('title', 'ট্রান্সফার ইতিহাস')

@section('content')
<div class="container mx-auto mt-6">

    {{-- 🔙 Back Button --}}
    <div class="mb-4">
        <a href="{{ url()->previous() }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded inline-block">
            ← ফিরে যান
        </a>
    </div>

    <h2 class="text-xl font-bold mb-4 text-center">আমার ভাউচার ট্রান্সফার ইতিহাস</h2>

    {{-- 🔍 Search Bar --}}
    <form method="GET" action="{{ route('voucher.transfer.history') }}" class="mb-4 text-center">
        <input type="text" name="search" placeholder="নাম্বার/মাধ্যম দিয়ে খুঁজুন..." value="{{ request('search') }}"
            class="border border-gray-400 px-4 py-2 rounded w-1/2 focus:outline-none focus:ring focus:border-blue-500" />
        <button type="submit"
            class="bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded ml-2">
            খুঁজুন
        </button>
    </form>

    @forelse ($transfers as $transfer)
        <div class="bg-white rounded-lg shadow-md p-4 mb-4 border border-gray-200">
            <p class="mb-1"><strong>📱 মাধ্যম:</strong> {{ $transfer->method }}</p>
            <p class="mb-1"><strong>🔢 নাম্বার:</strong> {{ $transfer->number }}</p>
            <p class="mb-1"><strong>💸 এমাউন্ট:</strong> ৳{{ number_format($transfer->amount, 2) }}</p>
            <p class="mb-1">
                <strong>📌 স্ট্যাটাস:</strong>
                @if ($transfer->status == 'pending')
                    <span class="text-yellow-600 font-semibold">Pending</span>
                @elseif ($transfer->status == 'approved')
                    <span class="text-green-600 font-semibold">Approved</span>
                @elseif ($transfer->status == 'rejected')
                    <span class="text-red-600 font-semibold">Rejected</span>
                @endif
            </p>
            <p class="mb-1"><strong>🗓️ তারিখ:</strong> {{ $transfer->created_at->format('d M Y h:i A') }}</p>
        </div>
    @empty
        <div class="text-center text-gray-500 py-8">
            কোনো ট্রান্সফার পাওয়া যায়নি।
        </div>
    @endforelse

</div>
@endsection
