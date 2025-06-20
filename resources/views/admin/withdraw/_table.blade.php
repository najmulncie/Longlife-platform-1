<!-- <div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700 text-sm uppercase text-left">
            <tr>
                <th class="px-4 py-3">User</th>
                <th class="px-4 py-3">Amount</th>
                <th class="px-4 py-3">Method</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @forelse($withdraws as $withdraw)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">{{ $withdraw->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-3">{{ number_format($withdraw->amount, 2) }} ৳</td>
                <td class="px-4 py-3">{{ $withdraw->method->name ?? 'N/A' }}</td>
                <td class="px-4 py-3 capitalize">
                    @if($withdraw->status === 'pending')
                        <span class="text-yellow-500 font-medium">Pending</span>
                    @elseif($withdraw->status === 'approved')
                        <span class="text-green-600 font-medium">Approved</span>
                    @else
                        <span class="text-red-500 font-medium">Rejected</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-right">
                    @if($type === 'pending')
                        <form action="{{ route('admin.withdraw.approve', $withdraw->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Approve</button>
                        </form>

                        <form action="{{ route('admin.withdraw.reject', $withdraw->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Reject</button>
                        </form>
                    @else
                        <span class="text-gray-400 italic">No Actions</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-6 text-center text-gray-500">No requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div> -->



<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700 text-sm uppercase text-left">
            <tr>
                <th class="px-4 py-3">User</th>
                <th class="px-4 py-3">Number</th> {{-- নাম্বার কলাম --}}
                <th class="px-4 py-3">Amount</th>
                <th class="px-4 py-3">Charge</th> {{-- চার্জ কলাম --}}
                <th class="px-4 py-3">Total</th> {{-- মোট কলাম --}}
                <th class="px-4 py-3">Method</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700 text-sm">
            @forelse($withdraws as $withdraw)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">{{ $withdraw->user->name ?? 'N/A' }}</td>
                <td class="px-4 py-3">{{ $withdraw->number ?? 'N/A' }}</td>
                <td class="px-4 py-3">{{ number_format($withdraw->amount, 2) }} ৳</td>
                <td class="px-4 py-3">{{ number_format($withdraw->charge, 2) }} ৳</td>
                <td class="px-4 py-3">{{ number_format($withdraw->total, 2) }} ৳</td>
                <td class="px-4 py-3">{{ $withdraw->method->name ?? 'N/A' }}</td>
                <td class="px-4 py-3 capitalize">
                    @if($withdraw->status === 'pending')
                        <span class="text-yellow-500 font-medium">Pending</span>
                    @elseif($withdraw->status === 'approved')
                        <span class="text-green-600 font-medium">Approved</span>
                    @else
                        <span class="text-red-500 font-medium">Rejected</span>
                    @endif
                </td>
                <td class="px-4 py-3 text-right">
                    @if($type === 'pending')
                        <form action="{{ route('admin.withdraw.approve', $withdraw->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Approve</button>
                        </form>

                        <form action="{{ route('admin.withdraw.reject', $withdraw->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Reject</button>
                        </form>
                    @else
                        <span class="text-gray-400 italic">No Actions</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-4 py-6 text-center text-gray-500">No requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
