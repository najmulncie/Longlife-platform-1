@extends('layout.admin')
@section('title', 'ড্রাইভার অফার লিস্ট')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-xl font-bold mb-4 text-center">📝 সব ড্রাইভার অফার</h2>

    <a href="{{ route('admin.driver-packs.create') }}" class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-4 rounded mb-4 inline-block">➕ নতুন অফার যুক্ত করুন</a>

    @if(session('success'))
        <div class="text-green-600 font-semibold mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full border text-center">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">সিম</th>
                <th class="px-4 py-2">অফার</th>
                <th class="px-4 py-2">মূল্য</th>
                <th class="px-4 py-2">ক্যাশব্যাক</th>
                <th class="px-4 py-2">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packs as $pack)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">{{ $pack->simOperator->name ?? 'N/A' }}</td>
                <td class="px-4 py-2">{{ $pack->offer_title }}</td>
                <td class="px-4 py-2">৳{{ $pack->price }}</td>
                <td class="px-4 py-2">৳{{ $pack->cashback }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.driver-packs.edit', $pack->id) }}" class="text-blue-500">✏️</a>
                    <form action="{{ route('admin.driver-packs.destroy', $pack->id) }}" method="POST" class="inline-block" onsubmit="return confirm('আপনি কি মুছে ফেলতে চান?');">
                        @csrf @method('DELETE')
                        <button class="text-red-600 ml-2">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
