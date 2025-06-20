{{-- resources/views/user/income_history.blade.php --}}

@extends('layout.user')

@section('content')

<div class="max-w-3xl mx-auto mt-6 px-4">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 border-b pb-2">
        <i class="fas fa-coins text-yellow-500 mr-2"></i>ইনকাম হিস্ট্রি
    </h2>

    @if ($commissions->isEmpty())
        <div class="text-center text-gray-500 text-lg">
            <i class="fas fa-info-circle text-gray-400 mr-2"></i>আপনি এখনো কোনো ইনকাম পাননি।
        </div>
    @else
        <div class="space-y-4">
            @foreach ($commissions as $commission)
                <div class="bg-white shadow-sm hover:shadow-md transition-all duration-300 rounded-lg border p-4 flex justify-between items-start">
                    
                    {{-- Left Side: Message + Time --}}
                    <div>
                        <p class="text-gray-800 font-medium text-base leading-snug">
                            <i class="fas fa-hand-holding-usd text-green-500 mr-2"></i>{{ $commission->message }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="far fa-clock mr-1"></i>{{ $commission->created_at->format('d M, Y • h:i A') }}
                        </p>
                    </div>

                    {{-- Right Side: Amount --}}
                    <div class="text-right">
                        <span class="text-green-600 text-lg font-bold flex items-center">
                            <i class="fas fa-coins mr-1 text-yellow-500"></i>৳ {{ number_format($commission->amount, 2) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
