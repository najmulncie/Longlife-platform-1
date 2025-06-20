@extends('layout.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">Inactive ইউজারগণ</h2>

@if($inactiveUsers->count())
<table class="w-full table-auto border-collapse border border-gray-300 rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">নাম</th>
            <th class="border border-gray-300 px-4 py-2">ইমেইল</th>
            <th class="border border-gray-300 px-4 py-2">মোবাইল</th>
            <th class="border border-gray-300 px-4 py-2">স্ট্যাটাস</th>
            <th class="border border-gray-300 px-4 py-2">অ্যাকশন</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inactiveUsers as $user)
        <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $user->mobile }}</td>
            <td class="border border-gray-300 px-4 py-2 text-yellow-600 font-bold">Inactive</td>
            <td class="border border-gray-300 px-4 py-2">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    <input type="hidden" name="is_active" value="1">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow">
                        Activate
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-gray-600">কোনো Inactive ইউজার নেই।</p>
@endif
@endsection
