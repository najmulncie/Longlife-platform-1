@extends('layout.user') {{-- আপনি যদি user layout তৈরি করে থাকেন --}}

@section('title', 'লিডারশিপ অর্জন করুন')

@section('content')
<div class="container mx-auto py-6 px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">🏆 লিডারশিপ অর্জন করুন</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($leadershipLevels as $level)
            @php
                // রেফার কৃত ইউজার কাউন্ট
                $userCount = $level->level_number == 1
                    ? auth()->user()->referrals()->where('is_active', 1)->count()
                    : auth()->user()->referrals()->whereHas('userLeaderships', function ($q) use ($level) {
                        $q->whereHas('leadershipLevel', function ($q2) use ($level) {
                            $q2->where('level_number', $level->level_number - 1);
                        });
                    })->count();

                // ইউজার পুরস্কার ক্লেইম করেছে কিনা
                $hasClaimed = auth()->user()->userLeaderships()
                    ->where('leadership_level_id', $level->id)
                    ->where('is_claimed', true)
                    ->exists();
            @endphp

            <div class="bg-white shadow-md rounded-lg p-4 border relative">
                <h3 class="text-lg font-semibold text-indigo-700">{{ $level->name }} লিডারশিপ অর্জন করুন</h3>
                <p class="mb-2 text-gray-600">{{ $level->reward_amount }} টাকা পুরস্কার জিতুন</p>

                @if($hasClaimed)
                    <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded">
                        🎉 অভিনন্দন! আপনি <strong>{{ $level->name }}</strong> লিডারশিপ অর্জন করেছেন।
                    </div>
                @elseif($userCount >= $level->target_count)
                    <form method="POST" action="{{ route('user.claimLeadership', $level->id) }}">
                        @csrf
                        <button type="submit"
                                class="mt-3 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full">
                            🎁 পুরস্কার ক্লেইম করুন
                        </button>
                    </form>
                @else
                    <div class="mt-3">
                        <p class="text-gray-700 font-medium">লেভেল: {{ $userCount }} / {{ $level->target_count }}</p>
                        <progress class="w-full mt-1" max="{{ $level->target_count }}" value="{{ $userCount }}"></progress>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
