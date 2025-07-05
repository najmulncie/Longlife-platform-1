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

    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-300 text-center">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">মাধ্যম</th>
                    <th class="px-4 py-2">নাম্বার</th>
                    <th class="px-4 py-2">এমাউন্ট</th>
                    <th class="px-4 py-2">স্ট্যাটাস</th>
                    <th class="px-4 py-2">তারিখ</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transfers as $transfer)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $transfer->method }}</td>
                        <td class="px-4 py-2">{{ $transfer->number }}</td>
                        <td class="px-4 py-2">৳{{ number_format($transfer->amount, 2) }}</td>
                        <td class="px-4 py-2">
                            @if ($transfer->status == 'pending')
                                <span class="text-yellow-600 font-semibold">Pending</span>
                            @elseif ($transfer->status == 'approved')
                                <span class="text-green-600 font-semibold">Approved</span>
                            @elseif ($transfer->status == 'rejected')
                                <span class="text-red-600 font-semibold">Rejected</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $transfer->created_at->format('d M Y h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">কোনো ট্রান্সফার পাওয়া যায়নি।</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
