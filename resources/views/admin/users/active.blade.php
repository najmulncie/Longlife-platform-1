@extends('layout.admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">✅ অ্যাক্টিভ ইউজারগণ</h2>

    @if($activeUsers->count())
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                    <tr>
                        <th class="px-4 py-3 border-b border-gray-300">ID</th>
                        <th class="px-4 py-3 border-b border-gray-300">নাম</th>
                        <th class="px-4 py-3 border-b border-gray-300">ইমেইল</th>
                        <th class="px-4 py-3 border-b border-gray-300">মোবাইল</th>
                        <th class="px-4 py-3 border-b border-gray-300">স্ট্যাটাস</th>
                        <th class="px-4 py-3 border-b border-gray-300">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($activeUsers as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 border-b border-gray-200">{{ $user->id }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">{{ $user->name }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">{{ $user->email }}</td>
                            <td class="px-4 py-3 border-b border-gray-200">{{ $user->mobile }}</td>
                            <td class="px-4 py-3 border-b border-gray-200 text-green-600 font-bold">Active</td>
                            <td class="px-4 py-3 border-b border-gray-200">
                                <form method="POST" action="{{ route('admin.users.ban', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                                        ব্যান করুন
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-gray-600 mt-4">
            📭 কোনো অ্যাক্টিভ ইউজার পাওয়া যায়নি।
        </div>
    @endif
</div>
@endsection
