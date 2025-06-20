@extends('layout.user')

@section('content')
<div class="p-4 space-y-6">

    @php
        $colors = [
            1 => 'from-blue-400 to-blue-600',
            2 => 'from-yellow-400 to-yellow-500',
            3 => 'from-green-400 to-green-600',
            4 => 'from-red-400 to-red-600',
            5 => 'from-indigo-400 to-indigo-600',
            6 => 'from-pink-400 to-pink-600',
            7 => 'from-teal-400 to-teal-600',
            8 => 'from-purple-400 to-purple-600',
            9 => 'from-orange-400 to-orange-600',
            10 => 'from-lime-400 to-lime-600',
        ];

        $totalMembers = 0;
        $totalActive = 0;

        for ($i = 1; $i <= 10; $i++) {
            $total = $levelData[$i]['total'] ?? 0;
            $active = $levelData[$i]['active'] ?? 0;
            $totalMembers += $total;
            $totalActive += $active;
        }

        $totalInactive = $totalMembers - $totalActive;
    @endphp

    <!-- Summary Box -->
    <div class="bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-2xl shadow-lg p-6 flex flex-col justify-center items-center text-white text-center min-h-[160px]">
        <h2 class="text-2xl font-bold mb-2">সারাংশ (১০ লেভেল)</h2>
        <p class="text-sm">মোট সদস্য: <strong>{{ $totalMembers }}</strong></p>
        <p class="text-sm">অ্যাক্টিভ: <strong>{{ $totalActive }}</strong> | ইনঅ্যাক্টিভ: <strong>{{ $totalInactive }}</strong></p>
    </div>

    <!-- Level Boxes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @for ($i = 1; $i <= 10; $i++)
            @php
                $total = $levelData[$i]['total'] ?? 0;
                $active = $levelData[$i]['active'] ?? 0;
                $inactive = $total - $active;
                $gradient = $colors[$i];
            @endphp

            <div class="bg-gradient-to-r {{ $gradient }} rounded-2xl shadow-lg p-6 flex flex-col justify-center items-center text-white text-center min-h-[220px] hover:scale-105 transition-transform duration-300">
                <h2 class="text-2xl font-bold mb-2">Level {{ $i }} Team</h2>
                <p class="text-sm">মোট সদস্য: <strong>{{ $total }}</strong></p>
                <p class="text-sm">অ্যাক্টিভ: <strong>{{ $active }}</strong> | ইনঅ্যাক্টিভ: <strong>{{ $inactive }}</strong></p>
                <a href="{{ url('/level/' . $i) }}"
                   class="mt-4 bg-white text-blue-600 font-semibold px-5 py-2 rounded-full inline-block shadow hover:bg-blue-100 transition">
                   তালিকা দেখুন
                </a>
            </div>
        @endfor
    </div>

</div>
@endsection
