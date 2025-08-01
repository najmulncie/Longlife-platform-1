@extends('layout.admin') 

@section('content')
<h1 class="text-2xl font-semibold mb-4">All Gmail Sales</h1>

@if($gmailSales->count())
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Gmail</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Password</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Submitted</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($gmailSales as $sale)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $sale->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $sale->gmail }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $sale->gmail_password }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            <span class="inline-block px-2 py-1 text-xs rounded-lg
                                @if($sale->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($sale->status === 'checked') bg-blue-100 text-blue-700
                                @elseif($sale->status === 'rejected') bg-red-100 text-red-700
                                @elseif($sale->status === 'completed') bg-green-100 text-green-700
                                @endif
                            ">
                                {{ ucfirst($sale->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $sale->created_at->diffForHumans() }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">
                            <form action="{{ route('admin.gmail.sales.status', $sale->id) }}" method="POST" class="flex gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="text-sm border rounded px-2 py-1">
                                    <option value="pending" @selected($sale->status === 'pending')>Pending</option>
                                    <option value="checked" @selected($sale->status === 'checked')>Checked</option>
                                    <option value="rejected" @selected($sale->status === 'rejected')>Rejected</option>
                                    <option value="completed" @selected($sale->status === 'completed')>Completed</option>
                                </select>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded">
        No Gmail Sales found.
    </div>
@endif
@endsection
