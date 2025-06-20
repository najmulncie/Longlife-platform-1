@extends('layout.admin')

@section('content')
<div class="bg-white shadow rounded-lg overflow-x-auto">
    <div class="bg-indigo-600 text-white text-xl font-semibold px-6 py-4 rounded-t-md">
        Pending Activation Requests
    </div>

    <div class="p-6">
        @if ($requests->count())
            <table class="min-w-full table-auto text-sm text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr class="text-gray-700 font-medium">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Method</th>
                        <th class="px-4 py-2">Number</th>
                        <th class="px-4 py-2">Txn ID</th>
                        <th class="px-4 py-2">Screenshot</th>
                        <th class="px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($requests as $request)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $request->user->name }}</td>
                            <td class="px-4 py-2 capitalize">{{ $request->method }}</td>
                            <td class="px-4 py-2">{{ $request->user_number }}</td>
                            <td class="px-4 py-2">{{ $request->transaction_id }}</td>
                            <td class="px-4 py-2">
                               
@if ($request->screenshot)
    <a href="{{ asset('uploads/activation_screenshots/' . $request->screenshot) }}" target="_blank">
        <img src="{{ asset('uploads/activation_screenshots/' . $request->screenshot) }}" alt="Screenshot" class="h-12 w-auto rounded border" />
    </a>
@else
    <span class="text-gray-400 italic">No Image</span>
@endif

                            </td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <form method="POST" action="{{ route('admin.activation.approve', $request->id) }}" class="inline">
                                    @csrf
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.activation.reject', $request->id) }}" class="inline">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-500 mt-4">No pending requests found.</p>
        @endif
    </div>
</div>
@endsection
