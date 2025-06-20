@extends('layout.admin')

@section('content')

<div class="p-4 max-w-full overflow-x-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">সকল ইউজার</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">নাম</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">মোবাইল</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ইমেইল</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ব্যালেন্স</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">স্ট্যাটাস</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">অ্যাকশন</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->mobile }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">{{ number_format($user->balance, 2) }} ৳</td>
                    <td class="px-4 py-3">
                        @if($user->is_active)
                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Active</span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded">Inactive</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center flex space-x-2 justify-center">
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="inline-block px-3 py-1 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                           Edit
                        </a>

                        @if($user->is_active)
                            <form method="POST" action="{{ route('admin.users.ban', $user->id) }}" 
                                  class="inline-block" 
                                  onsubmit="return confirm('আপনি কি সত্যিই এই ইউজারকে Ban করতে চান?');">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 text-sm text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition">
                                    Ban
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.users.unban', $user->id) }}" 
                                  class="inline-block" 
                                  onsubmit="return confirm('আপনি কি সত্যিই এই ইউজারকে Unban করতে চান?');">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 text-sm text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white transition">
                                    Unban
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
