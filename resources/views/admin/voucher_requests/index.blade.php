@extends('layout.admin')

@section('title', 'পেন্ডিং ভাউচার রিকুয়েস্ট')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <h2 class="text-2xl font-semibold text-center mb-6">Voucher Transfer Requests</h2>

    <div class="mb-4 text-center">
        <input type="text" id="searchInput" placeholder="Search by user, number, or method..." 
            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none" 
            onkeyup="filterTable()" />
    </div>

    <div class="overflow-x-auto rounded-lg shadow">
        <table id="transferTable" class="min-w-full divide-y divide-gray-200 text-sm text-center">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-4 py-2">Sl NO.</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Method</th>
                    <th class="px-4 py-2">Number</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($transfers as $transfer)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $transfer->user->name ?? 'Unknown' }}</td>
                    <td class="px-4 py-2">{{ $transfer->method }}</td>
                    <td class="px-4 py-2">{{ $transfer->number }}</td>
                    <td class="px-4 py-2 text-green-600 font-medium">৳{{ number_format($transfer->amount, 2) }}</td>
                    <td class="px-4 py-2 capitalize {{ $transfer->status == 'pending' ? 'text-yellow-500' : ($transfer->status == 'approved' ? 'text-green-600' : 'text-red-500') }}">
                        {{ $transfer->status }}
                    </td>
                    <td class="px-4 py-2">
                        @if($transfer->status === 'pending')
                        <form method="POST" action="{{ route('admin.voucher.transfers.update', [$transfer->id, 'approved']) }}" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-xs px-3 py-1 rounded">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.voucher.transfers.update', [$transfer->id, 'rejected']) }}" class="inline-block ml-1">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded">Reject</button>
                        </form>
                        @else
                        <span class="text-sm text-gray-500 italic">{{ ucfirst($transfer->status) }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#transferTable tbody tr');

    rows.forEach(row => {
        const rowText = row.innerText.toLowerCase();
        row.style.display = rowText.includes(input) ? '' : 'none';
    });
}
</script>
@endsection
