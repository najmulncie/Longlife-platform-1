@extends('layout.admin')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="bg-green-600 text-white text-xl font-semibold px-6 py-4 rounded-t-md">
            Approved Activation Requests
        </div>

        <div class="p-6">
            @if ($requests->count())
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-sm font-medium text-gray-700">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Payment Method</th>
                            <th class="px-4 py-2">Payment Number</th>
                            <th class="px-4 py-2">Txn ID</th>
                            <th class="px-4 py-2">Approved At</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        @foreach ($requests as $request)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $request->user->name }}</td>
                                <td class="px-4 py-2">{{ $request->method }}</td>
                                <td class="px-4 py-2">{{ $request->user_number }}</td>
                                <td class="px-4 py-2">{{ $request->transaction_id }}</td>
                                <td class="px-4 py-2">{{ $request->updated_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-gray-500 mt-4">No approved requests found.</p>
            @endif
        </div>
    </div>
@endsection
