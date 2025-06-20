@extends('layout.user')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden; /* স্ক্রল বন্ধ */
    }
</style>

<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-sm text-center">
        {{-- Green animated checkmark --}}
        <div class="flex justify-center mb-3">
            <svg class="w-14 h-14 text-green-500 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h2 class="text-xl font-semibold text-green-600 mb-1">✅ রিকোয়েস্ট গ্রহণ করা হয়েছে</h2>
        <p class="text-gray-700 text-sm mb-3">অনুগ্রহ করে কিছুক্ষণ অপেক্ষা করুন। আপনার অনুরোধটি দ্রুত রিভিউ করা হবে।</p>

        {{-- Countdown --}}
        <p class="text-xs text-gray-500" id="countdown">৪ সেকেন্ডে ড্যাশবোর্ডে নিয়ে যাওয়া হবে...</p>
    </div>
</div>

<script>
    let seconds = 4;
    const countdownElement = document.getElementById('countdown');

    const countdown = setInterval(() => {
        seconds--;
        countdownElement.textContent = `${seconds} সেকেন্ডে ড্যাশবোর্ডে নিয়ে যাওয়া হবে...`;

        if (seconds <= 0) {
            clearInterval(countdown);
            window.location.href = "{{ route('dashboard') }}";
        }
    }, 1000);
</script>
@endsection
