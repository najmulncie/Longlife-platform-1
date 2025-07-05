@extends('layout.admin')

@section('title', 'Driver Pack Requests')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4 text-center">Driver Pack Purchase Requests</h2>

    {{-- ✅ Search Bar --}}
   <form method="GET" action="{{ route('admin.driver-packs.request') }}" class="mb-4">
        <div class="flex flex-row items-center gap-2 w-full sm:flex-nowrap flex-wrap">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by user or number"
                class="flex-grow border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 w-full sm:w-auto" />

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition w-full sm:w-auto">
                🔍 Search
            </button>
        </div>
    </form>



    {{-- ✅ Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- ✅ Responsive Table Wrapper --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full table-auto text-sm text-left text-gray-600">
            <thead class="bg-gray-200 text-center text-gray-700 text-xs uppercase">
                <tr>
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Sim</th>
                    <th class="px-4 py-2 border">Offer</th>
                    <th class="px-4 py-2 border">Validity</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Cashback</th>
                    <th class="px-4 py-2 border">Phone Number</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $purchase)
                    <tr class="text-center bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $purchase->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ ucfirst($purchase->sim_operator) }}</td>
                        <td class="px-4 py-2 border">{{ $purchase->offer_title }}</td>
                        <td class="px-4 py-2 border text-red-600 font-bold">{{ $purchase->validity ?? 'N/A' }} Days</td>
                        <td class="px-4 py-2 border text-red-600 font-bold">৳{{ $purchase->price }}</td>
                        <td class="px-4 py-2 border text-green-600 font-bold">৳{{ $purchase->cashback }}</td>
                        <td class="px-4 py-2 border">{{ $purchase->phone_number }}</td>
                        <td class="px-4 py-2 border">
                            @if($purchase->status === 'approved')
                                <span class="text-green-600 font-semibold">Approved</span>
                            @else
                                <span class="text-yellow-600 font-semibold">Pending</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">
                            @if($purchase->status !== 'approved')
                                <form method="POST" action="{{ route('admin.driver-pack.approve', $purchase->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                        Approve
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-500">✔</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-600">No purchase requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ✅ Pagination --}}
    <div class="mt-4">
        {{ $purchases->appends(request()->query())->links() }}
    </div>
</div>
@endsection
