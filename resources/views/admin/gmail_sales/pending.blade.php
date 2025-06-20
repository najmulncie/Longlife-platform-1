@extends('layout.admin')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Pending Gmail Sales</h1>

@if($gmailSales->count())

    <form method="POST" action="{{ route('admin.gmail.bulkAction') }}">
        @csrf

        <!-- Top Buttons -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.gmail.export') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                Export to Excel
            </a>
            <div class="space-x-2">
                <button type="submit" name="action" value="checked" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm">
                    Mark as Checked
                </button>
                <button type="submit" name="action" value="rejected" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm">
                    Mark as Rejected
                </button>
                <button type="submit" name="action" value="completed" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-2 rounded text-sm">
                    Mark as Completed
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-100">
                    <tr>
                        <th class="px-4 py-2">
                            <input type="checkbox" id="checkAll" class="form-checkbox text-yellow-600">
                        </th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">User</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">Gmail</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">Password</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">Status</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">Submitted</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-yellow-700">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-yellow-200">
                    @foreach($gmailSales as $sale)
                        <tr class="hover:bg-yellow-50">
                            <td class="px-4 py-2">
                                <input type="checkbox" name="ids[]" value="{{ $sale->id }}" class="form-checkbox text-yellow-600">
                            </td>
                            <td class="px-4 py-2 text-sm text-yellow-800">{{ $sale->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-800">{{ $sale->gmail }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-800">{{ $sale->gmail_password }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-800">
                                <span class="inline-block px-2 py-1 text-xs rounded-lg bg-yellow-100 text-yellow-700">
                                    {{ ucfirst($sale->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-sm text-yellow-800">{{ $sale->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-800">
                                <form action="{{ route('admin.gmail.sales.status', $sale->id) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="text-sm border rounded px-2 py-1">
                                        <option value="pending" @selected($sale->status === 'pending')>Pending</option>
                                        <option value="checked" @selected($sale->status === 'checked')>Checked</option>
                                        <option value="rejected" @selected($sale->status === 'rejected')>Rejected</option>
                                        <option value="completed" @selected($sale->status === 'completed')>Completed</option>
                                    </select>
                                    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>

@else
    <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded">
        No Pending Gmail Sales found.
    </div>
@endif

<script>
    // Select all checkbox
    document.getElementById('checkAll').addEventListener('click', function () {
        let checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
@endsection