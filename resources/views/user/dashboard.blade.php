@extends('layout.user')
@section('title', 'LONG LIFE')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@section('content')

@if(Auth::user()->admin_message)
    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4 shadow flex justify-between items-start">
        <div>
            <strong class="block mb-1">⚠ অ্যাডমিন থেকে সতর্কতা:</strong>
            <p class="whitespace-pre-line">{{ Auth::user()->admin_message }}</p>
        </div>
        <form action="{{ route('user.dismissMessage') }}" method="POST" class="ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 text-xl font-bold hover:text-red-700">&times;</button>
        </form>
    </div>
@endif

@if (!auth()->user()->is_active)
    <div class="bg-yellow-100 text-yellow-800 p-4 mb-4 rounded">
        আপনার অ্যাকাউন্টটি <strong>একটিভ</strong> নয়। দয়া করে <a href="{{ route('user.activate') }}" class="text-blue-600 font-bold underline">একটিভ করুন</a>
    </div>
@endif

<!-- Header Title -->
    <div style="background: linear-gradient(to right, #36D1DC, #5B86E5); color: white; font-size: 24px; font-weight: bold; padding: 15px; border-radius: 10px; text-align: center; margin-bottom: 30px;">
      আমাদের প্রজেক্ট সমূহ 
    </div>

    <!-- Grid Container -->
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
      @php
        $items = [
          ['icon' => 'fas fa-mobile-alt', 'text' => 'মোবাইল রিচার্জ', 'color' => ['#ff9966', '#ff5e62'], 'link' => '/update'],
          ['icon' => 'fas fa-car', 'text' => 'ড্রাইভ অফার', 'color' => ['#56ccf2', '#2f80ed'], 'link' => '/update'],
          ['icon' => 'fas fa-user', 'text' => 'ড্রাইভ এজেন্ট', 'color' => ['#f7971e', '#ffd200'], 'link' => '/update'],
          ['icon' => 'fas fa-file-invoice-dollar', 'text' => 'পে বিল', 'color' => ['#36d1dc', '#5b86e5'], 'link' => '/update'],
          ['icon' => 'fas fa-store-alt', 'text' => 'অনলাইন শপ', 'color' => ['#00c3ff', '#ffff1c'], 'link' => '/update'],
          ['icon' => 'fas fa-box-open', 'text' => 'রিসেলিং প্রোডাক্ট', 'color' => ['#ff6a00', '#ee0979'], 'link' => '/update'],
          ['icon' => 'fas fa-store', 'text' => 'ভেন্ডরশিপ', 'color' => ['#8e2de2', '#4a00e0'], 'link' => '/update'],
          ['icon' => 'fas fa-globe', 'text' => 'ডিজিটাল সার্ভিস', 'color' => ['#43cea2', '#185a9d'], 'link' => '/update'],
          
          ['icon' => 'fas fa-hands-helping', 'text' => 'সোশ্যাল সার্ভিস', 'color' => ['#00c6ff', '#0072ff'], 'link' => '/update'],
          
          ['icon' => 'fas fa-briefcase', 'text' => 'মাইক্রো জব', 'color' => ['#f85032', '#e73827'], 'link' => '/update'],
          ['icon' => 'fas fa-bullhorn', 'text' => 'জব পোস্ট', 'color' => ['#7b4397', '#dc2430'], 'link' => '/update'],
          ['icon' => 'fas fa-envelope', 'text' => 'জিমেইল সেল', 'color' => ['#0f2027', '#2c5364'], 'link' => '/gmail-sell'],
          ['icon' => 'fab fa-facebook-f', 'text' => 'ফেসবুক সেল', 'color' => ['#3b5998', '#8b9dc3'], 'link' => '/update'],
          ['icon' => 'fab fa-telegram-plane', 'text' => 'টেলিগ্রাম সেল', 'color' => ['#0088cc', '#32a8d1'], 'link' => '/update'],
          ['icon' => 'fab fa-instagram', 'text' => 'ইন্সটাগ্রাম সেল', 'color' => ['#e1306c', '#c13584'], 'link' => '/update'],
          ['icon' => 'fab fa-whatsapp', 'text' => 'হোয়াটঅ্যাপ সেল', 'color' => ['#25D366', '#128C7E'], 'link' => '/update'],
          ['icon' => 'fas fa-sync-alt', 'text' => 'স্পিন করে ইনকাম', 'color' => ['#7F00FF', '#E100FF'], 'link' => '/update'],
          ['icon' => 'fas fa-ad', 'text' => 'এডস জব', 'color' => ['#fc4a1a', '#f7b733'], 'link' => '/update'],
          ['icon' => 'fas fa-video', 'text' => 'ভিডিও জব', 'color' => ['#56ab2f', '#a8e063'], 'link' => '/update'],
          ['icon' => 'fas fa-heart', 'text' => 'লাইক কমেন্ট জব', 'color' => ['#ed213a', '#93291e'], 'link' => '/update'],
          ['icon' => 'fas fa-keyboard', 'text' => 'টাইপিং জব', 'color' => ['#8360c3', '#2ebf91'], 'link' => '/update'],
          ['icon' => 'fas fa-question', 'text' => 'কুইজ জব', 'color' => ['#ff416c', '#ff4b2b'], 'link' => '/update'],
          
          ['icon' => 'fas fa-gift', 'text' => 'টার্গেট বোনাস', 'color' => ['#f7971e', '#ffd200'], 'link' => '/targets'],
          ['icon' => 'fas fa-users', 'text' => 'লিডারশিপ', 'color' => ['#00b09b', '#96c93d'], 'link' => '/leadership'],
          ['icon' => 'fas fa-tint', 'text' => 'ব্লাড ব্যাংক', 'color' => ['#c33764', '#1d2671'], 'link' => '/update'],
          ['icon' => 'fas fa-hand-holding-heart', 'text' => 'ডোনেশন', 'color' => ['#f85032', '#e73827'], 'link' => '/update'],
          ['icon' => 'fas fa-kaaba', 'text' => 'ওমরা হজ', 'color' => ['#0f0c29', '#302b63'], 'link' => '/update'],
          ['icon' => 'fas fa-chalkboard-teacher', 'text' => 'টিউশন মিডিয়া', 'color' => ['#43e97b', '#38f9d7'], 'link' => '/update'],
          ['icon' => 'fas fa-user-md', 'text' => 'ডক্টর সেবা', 'color' => ['#141e30', '#243b55'], 'link' => '/update'],
          ['icon' => 'fas fa-server', 'text' => 'হোস্টিং ডোমেইন', 'color' => ['#3a7bd5', '#3a6073'], 'link' => '/update'],
          ['icon' => 'fas fa-shopping-basket', 'text' => 'মার্কেটপ্লেস', 'color' => ['#bdc3c7', '#2c3e50'], 'link' => '/update'],
          ['icon' => 'fas fa-chart-line', 'text' => 'গ্লোবাল বোনাস', 'color' => ['#f46b45', '#eea849'], 'link' => '/global-bonus'],
        ];
    $isActive = auth()->user()->is_active;
  @endphp

  @foreach($items as $item)
    <div style="width: 23%; background: white; text-align: center; padding: 10px; margin-bottom: 15px; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); cursor: pointer;"
         onclick="{{ $isActive ? "window.location.href='{$item['link']}'" : 'showInactivePopup()' }}">
      <div style="width: 50px; height: 50px; border-radius: 50%; margin: 0 auto 8px; background: linear-gradient(to right, {{ $item['color'][0] }}, {{ $item['color'][1] }}); display: flex; align-items: center; justify-content: center;">
        <i class="{{ $item['icon'] }}" style="color: white; font-size: 20px;"></i>
      </div>
      <div style="font-size: 12px; font-weight: 500;">{{ $item['text'] }}</div>
    </div>
  @endforeach
</div>

<!-- Popup Modal -->
<div id="inactiveModal" style="display: none; position: fixed; top: 0; left: 0; width:100%; height:100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; justify-content: center; align-items: center;">
  <div style="background: white; padding: 25px; border-radius: 10px; max-width: 300px; text-align: center;">
    <p style="font-weight: bold; color: #e53e3e;">আপনার অ্যাকাউন্ট একটিভ নয়</p>
    <p style="margin: 10px 0;">সেবাগুলো ব্যবহার করতে হলে অ্যাকাউন্ট একটিভ করতে হবে</p>
    <a href="{{ route('user.activate') }}" style="background: #3182ce; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">এখনই একটিভ করুন</a>
    <br><br>
    <button onclick="document.getElementById('inactiveModal').style.display='none'" style="color: #555;">বন্ধ করুন</button>
  </div>
</div>

<script>
  function showInactivePopup() {
    document.getElementById('inactiveModal').style.display = 'flex';
  }
</script>

@endsection