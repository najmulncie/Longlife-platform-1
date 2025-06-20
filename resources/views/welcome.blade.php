@extends('layout.public')

@section('title', 'Welcome Page')

@section('content')

    <!-- Hero Banner Section -->
    <section class="bg-gradient-to-br from-indigo-700 to-blue-600 text-white py-10 px-6">
        <div class="bg-white bg-opacity-10 backdrop-blur-md rounded-2xl p-6 max-w-md mx-auto shadow-xl text-center">
            <h1 class="text-2xl font-bold mb-2">
                স্বাগতম {{ config('app.name','Long Life') }}-এ!
            </h1>
            <p class="text-sm font-light">
                ঘরে বসেই আয়ের একটি নির্ভরযোগ্য ও সহজ মাধ্যম — এখনই যাত্রা শুরু করুন।
            </p>
            <a href="/register"
               class="inline-block mt-4 px-5 py-2 bg-white text-indigo-700 font-semibold text-sm rounded-full hover:bg-gray-100 transition">
                রেজিস্টার করুন
            </a>
        </div>
    </section>

    <!-- App Download Section -->
    <section class="bg-white py-10 px-6 text-center">
        <div class="max-w-md mx-auto bg-gray-100 p-5 rounded-xl shadow">
            <p class="text-base text-gray-800 mb-3">আমাদের অ্যাপ ডাউনলোড করে আরও সহজে আয় করুন:</p>
            <a href="/login" class="block w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg text-sm font-medium transition">
                📱 অ্যাপ ডাউনলোড করুন
            </a>
        </div>
    </section>
<!-- Leadership Achievers -->
<section class="bg-gray-100 py-10 px-4">
    <h2 class="text-xl font-bold text-center text-gray-800 mb-5">লিডারশিপ অ্যাচিভারস</h2>

    <div x-data="{ current: 0, images: [
        '/images/leader1.jpg',
        '/images/leader2.jpg',
        '/images/leader3.jpg'
    ] }"
         x-init="setInterval(() => current = (current + 1) % images.length, 4000)"
         class="relative w-full max-w-[320px] mx-auto overflow-hidden rounded-xl shadow-lg h-[320px] bg-white flex items-center justify-center">
        
        <!-- Slides -->
        <template x-for="(img, index) in images" :key="index">
            <div x-show="current === index"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90"
                 class="absolute inset-0 flex items-center justify-center">
                <img :src="img" class="max-h-full max-w-full object-contain">
            </div>
        </template>
    </div>

    <p class="text-center text-gray-600 mt-3 text-sm">
        যারা অসাধারণ নেতৃত্ব ও অর্জনের মাধ্যমে আমাদের প্ল্যাটফর্মে আলাদা হয়ে উঠেছেন
    </p>
</section>

    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection