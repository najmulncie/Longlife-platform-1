@extends('layout.admin')
@section('title', 'সিম অপারেটর ম্যানেজমেন্ট')

@section('content')
<div class="container mx-auto mt-6 max-w-xl">
    <h2 class="text-xl font-bold mb-4 text-center">📱 সিম অপারেটর তালিকা</h2>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.sim-operators.store') }}" method="POST" class="flex items-center mb-6">
        @csrf
        <input type="text" name="name" class="flex-1 border p-2 rounded mr-2" placeholder="নতুন সিম অপারেটরের নাম লিখুন..." required>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">➕ যুক্ত করুন</button>
    </form>

    <table class="w-full border text-center">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">নাম</th>
                <th class="px-4 py-2">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($operators as $operator)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $operator->name }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.sim-operators.destroy', $operator->id) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিতভাবে মুছে ফেলতে চান?');">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 font-bold">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-gray-500 py-4">কোনো সিম অপারেটর পাওয়া যায়নি।</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
