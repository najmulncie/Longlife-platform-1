@extends('layout.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">লিডারশিপ লেভেল তালিকা</h1>

    <a href="{{ route('admin.leadership-levels.create') }}"
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + নতুন লেভেল যুক্ত করুন
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr class="bg-gray-200 text-left text-sm font-bold text-gray-700">
                    <th class="p-3">#</th>
                    <th class="p-3">নাম</th>
                    <th class="p-3">পুরস্কার</th>
                    <th class="p-3">টার্গেট</th>
                    <th class="p-3">টার্গেট টাইপ</th>
                    <th class="p-3">লেভেল নাম্বার</th>
                    <th class="p-3">অ্যাকশন</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                    <tr class="border-t">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $level->name }}</td>
                        <td class="p-3">{{ $level->reward_amount }} ৳</td>
                        <td class="p-3">{{ $level->target_count }} জন</td>
                        <td class="p-3">{{ ucfirst($level->target_type) }}</td>
                        <td class="p-3">{{ $level->level_number }}</td>
                        <td class="p-3 space-x-2">
                            <a href="{{ route('admin.leadership-levels.edit', $level->id) }}"
                               class="text-blue-600 hover:underline">এডিট</a>
                            <form action="{{ route('admin.leadership-levels.destroy', $level->id) }}"
                                  method="POST" class="inline"
                                  onsubmit="return confirm('আপনি কি নিশ্চিতভাবে ডিলিট করতে চান?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">ডিলিট</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($levels->isEmpty())
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">কোনো লিডারশিপ লেভেল পাওয়া যায়নি।</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
