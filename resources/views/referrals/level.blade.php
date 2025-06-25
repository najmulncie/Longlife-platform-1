@extends('layout.user')

@section('content')
<style>
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-slide-in {
        animation: slideInLeft 0.5s ease-out forwards;
    }
</style>

<div class="p-4">
    <!-- সার্চ বার -->
    <form method="GET" action="{{ url()->current() }}">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by Refer Code..." 
               class="w-full p-3 rounded-full border border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500 mb-4" />
    </form>

    <!-- মেম্বার লিস্ট -->
    @forelse($referrals as $ref)
        @php
            $colors = ['bg-blue-100', 'bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-purple-100', 'bg-red-100'];
            $colorClass = $colors[$loop->index % count($colors)];
        @endphp

        <div class="flex items-start p-4 mb-6 rounded-2xl shadow-lg {{ $colorClass }} animate-slide-in" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <!-- প্রোফাইল ছবি -->
            <!-- <div class="w-16 h-16 rounded-full bg-black flex items-center justify-center text-white mr-4 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9.004 9.004 0 0112 15c2.21 0 4.21.805 5.879 2.137M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div> -->


            <!-- প্রোফাইল ছবি (with online status) -->
           


            @foreach ($user as $user)
                @php
                   
                    $isOnline = false;
                    if ($user->last_seen) {
                        $isOnline = Carbon\Carbon::parse($user->last_seen)->diffInMinutes(now()) < 1;
                    }
                @endphp

                <div class="relative mr-4 inline-block text-center">
                    <div class="w-16 h-16 rounded-full bg-black flex items-center justify-center text-white shadow-md">
                        <!-- user icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9.004 9.004 0 0112 15c2.21 0 4.21.805 5.879 2.137M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    @if($isOnline)
                        <span class="absolute top-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-green-500"></span>
                    @else
                        <span class="absolute bottom-0 right-0 w-4 h-4 rounded-full border-2 border-white bg-gray-400"></span>
                    @endif

                    <div class="mt-2 text-sm">{{ $user->name }}</div>
                </div>
            @endforeach









    
            <!-- ইউজার ইনফো -->
            <div class="text-sm space-y-1">
                <p><strong>Name:</strong> {{ $ref->name }}</p>
                <p><strong>Refer Code:</strong> {{ $ref->referral_code ?? $ref->refer_code }}</p>
                <p>
                    <strong>Status:</strong> 
                    @if($ref->is_active)
                        <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">Active</span>
                    @else
                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs">In-Active</span>
                    @endif
                </p>
                <p><strong>Joined:</strong> {{ $ref->created_at->format('d M, Y') }}</p>

                @php
                    $upline = \App\Models\User::find($ref->referred_by);
                @endphp

                <p><strong>Upline:</strong> {{ $upline ? $upline->referral_code : 'N/A' }}</p>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500">No members found for this level.</p>
    @endforelse
</div>
@endsection
