{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ config('app.name','Long Life') }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    body {
        font-family: 'Noto Sans Bengali', sans-serif;
    }
</style>

</head>

<body class="bg-gray-100 h-screen flex flex-col overflow-hidden">

  <!-- Header -->
<header class="bg-white shadow-md py-4 px-6 flex justify-between items-center fixed top-0 w-full z-30">
  <div class="flex items-center space-x-4">
    <!-- Menu Toggle (Left Side) -->
    <button id="menu-toggle" class="text-2xl focus:outline-none">
      &#9776;
    </button>
    <!-- Logo -->
    <h1 class="text-xl font-bold text-indigo-700">{{ config('app.name','Long Life') }}</h1>
  </div>

  <!-- Profile Dropdown (Right Side) -->
  <div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="focus:outline-none">
      <i class="fa-solid fa-user text-2xl text-gray-600"></i>

    </button>

    <div x-show="open" @click.away="open = false"
         class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg py-2 z-50">
      <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">🔐 লগিন </a>
      <a href="/register" class="block px-4 py-2 hover:bg-gray-100 text-gray-700">📝 রেজিষ্টার</a>
    </div>
  </div>
</header>


  <!-- Sidebar -->
  <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-40 flex flex-col">
    {{-- Sidebar Header --}}
    <div class="flex items-center justify-between px-4 py-4 border-b bg-indigo-600 text-white">
      <h2 class="text-lg font-semibold"> মেনু </h2>
      <button id="close-sidebar" class="bg-white text-indigo-600 font-bold rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-100">
        &times;
      </button>
    </div>

    {{-- Sidebar Links --}}
    <div class="flex-grow overflow-y-auto flex flex-col justify-between">
      <div class="p-4 space-y-4">
        <a href="{{ url('/') }}" class="hover:text-indigo-600 block">🏠 হোম </a>
        <a href="{{ url('/about') }}" class="hover:text-indigo-600 block">ℹ️ আমাদের সম্পর্কে </a>
        <a href="{{ url('/contact') }}" class="hover:text-indigo-600 block">📞 সাপোর্ট </a>
        <a href="{{ route('login') }}" class="hover:text-indigo-600 block">🔐 লগিন </a>
        <a href="/register" class="hover:text-indigo-600 block">📝 রেজিষ্টার </a>
      </div>

      {{-- Social Footer --}}
      <div class="p-4 border-t bg-white">
        <h3 class="text-base font-bold text-gray-700 mb-2">Follow Us:</h3>
        <div class="flex space-x-3">
          <a href="#" target="_blank" class="text-blue-600 hover:scale-125 transition-transform text-2xl">
            <i class="fab fa-facebook-square"></i>
          </a>
          <a href="#" target="_blank" class="text-red-600 hover:scale-125 transition-transform text-2xl">
            <i class="fab fa-youtube-square"></i>
          </a>
          <a href="#" target="_blank" class="text-sky-500 hover:scale-125 transition-transform text-2xl">
            <i class="fab fa-telegram"></i>
          </a>
          <a href="#" target="_blank" class="text-green-500 hover:scale-125 transition-transform text-2xl">
            <i class="fab fa-whatsapp-square"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30"></div>

  <!-- Main Content Area -->
  <main class="flex-1 overflow-y-auto pt-20 pb-20 px-6">
    @yield('content')
  </main>

  <!-- WhatsApp Floating Button -->
<a href="https://wa.me/8801890665326?text=I%20need%20help" target="_blank"
   class="fixed bottom-8 right-5 bg-green-500 text-white w-16 h-16 flex items-center justify-center rounded-full shadow-lg hover:bg-green-600 z-50">
  <i class="fab fa-whatsapp text-3xl"></i>
</a>

  <!-- Footer -->
  <footer class="bg-white text-center py-4 text-gray-600 fixed bottom-0 w-full shadow-inner z-20">
    <p>&copy; {{ date('Y') }} {{ config('app.name','Long Life') }}. All rights reserved.</p>
    <p class="text-sm">Powered by  & TechiT LAB.</p>
  </footer>

  <!-- Sidebar Toggle Script -->
  <script>
    const sidebar = document.getElementById('sidebar');
    const toggle  = document.getElementById('menu-toggle');
    const closeBtn= document.getElementById('close-sidebar');
    const overlay = document.getElementById('overlay');

    toggle.addEventListener('click', () => {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    });
    closeBtn.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>

</body>
</html>
