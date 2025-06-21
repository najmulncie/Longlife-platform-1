@extends('layout.user')
@section('title', 'গ্লোবাল বোনাস প্রজেক্ট')


@section('content')



  <style>
    body {
      font-family: sans-serif;
      background: #e3f2fd;
      padding: 20px;
      margin: 0;
    }

    .card {
      background: #2196f3;
      color: white;
      padding: 24px;
      border-radius: 16px;
      text-align: center;
      margin-bottom: 20px;
      margin-top: 50px;
    }

    .section {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .progress {
      background: #f1f1f1;
      border-radius: 8px;
      overflow: hidden;
      height: 20px;
      margin: 10px 0;
    }

    .progress-bar {
      height: 100%;
      background: #4caf50;
      width: 0%;
      transition: width 0.3s;
    }

    .btn {
      background: #1976d2;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      margin-top: 10px;
      display: inline-block;
    }

    ul {
      padding-left: 20px;
    }

    .hidden {
      display: none;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      font-size: 14px;
    }

    th {
      background: #e3f2fd;
    }

    h2, h3 {
      margin-top: 0;
    }

    .back-btn {
        margin-top: 50px;
        margin-bottom: 20px;
        background: #2196f3;
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 10px;
    }

    .profile img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
    }

    .achievement {
      background: #f0f8ff;
      border-left: 6px solid #4caf50;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
      transition: 0.3s ease;
    }

    .message {
      background: #d4edda;
      color: #155724;
      padding: 10px 15px;
      border-left: 6px solid #28a745;
      border-radius: 8px;
      margin-bottom: 15px;
      display: none;
      font-weight: bold;
    }

    .bonus-announcement {
      background: #fffbe6;
      border-left: 6px solid #ffc107;
      padding: 12px;
      border-radius: 10px;
      margin-bottom: 15px;
      font-size: 16px;
    }

    .big-money {
      font-size: 36px;
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }
  </style>


  <!-- গ্লোবাল বোনাস পেজ -->
 <div id="bonusTab">
  <div class="card">
    <h2>🌐 গ্লোবাল বোনাস</h2>
    <span class="big-money">৳{{ $bonusAmount }}</span>
  </div>

  @if(session('success'))
    <div id="congratsMessage" class="message" style="display:block">
      🎉 {{ session('success') }}
    </div>
  @else
    <div id="congratsMessage" class="message" style="display:none">
      🎉 অভিনন্দন! আপনি গ্লোবাল বোনাস ৳{{ $bonusAmount }} পেয়েছেন।
    </div>
  @endif

  <div class="section">
    <h3>📜 গ্লোবাল বোনাস হিস্ট্রি</h3>
    <button class="btn" onclick="showTab('historyTab')">দেখুন</button>
  </div>

  <div class="section">
    <h3>📌 শর্ত সমূহ</h3>
    <ul>
      <li>আপনার দ্বিতীয় লেভেলে {{ $required }}টি একটিভ রেফার থাকতে হবে।</li>
    </ul>

    <p>বর্তমানে একটিভ হয়েছে: <span id="activeCount">{{ $activeRefers->count() }}</span> জন</p>
    <div class="progress">
      <div class="progress-bar" id="progressBar" style="width: {{ min(($activeRefers->count() / $required) * 100, 100) }}%"></div>
    </div>
    <p>অগ্রগতি: <span id="progressPercent">{{ min(($activeRefers->count() / $required) * 100, 100) }}%</span></p>

    <button class="btn" onclick="showTab('referTab')">👥 একটিভ রেফার লিস্ট দেখুন</button>
    <br>
    <form action="{{ route('global-bonus.achieve') }}" method="POST">
      @csrf
      <button type="submit" class="btn" id="achieveBtn" {{ $activeRefers->count() < $required ? 'disabled' : '' }}>
        🎯 এচিপ করুন
      </button>
    </form>
  </div>
</div>

<!-- একটিভ রেফার লিস্ট পেজ -->
<div id="referTab" class="hidden">
  <button class="btn back-btn" onclick="showTab('bonusTab')">🔙 ফিরে যান</button>
  <h2>👥 একটিভ রেফার লিস্ট</h2>
  <table>
    <thead>
      <tr>
        <th>নাম</th>
        <th>একাউন্ট</th>
        <th>রেফার কোড</th>
        <th>আপলাইন</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($activeRefers as $refer)
        <tr>
          <td>{{ $refer->name }}</td>
          <td>{{ $refer->mobile }}</td>
          <td>{{ $refer->referral_code }}</td>
          <td>{{ $refer->referred_by }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- গ্লোবাল বোনাস হিস্ট্রি পেজ -->
<div id="historyTab" class="hidden">
  <button class="btn back-btn" onclick="showTab('bonusTab')">🔙 ফিরে যান</button>
  <h2>📜 গ্লোবাল বোনাস হিস্ট্রি</h2>
  <div id="achievementList">
    @foreach ($bonusHistories as $index => $bonus)
      <div class="achievement">
        <div class="bonus-announcement">
          🎉 অভিনন্দন! আপনি {{ $loop->iteration }}তম গ্লোবাল বোনাস অর্জন করেছেন। <br>
          <strong style="font-size: 24px">৳{{ $bonus->amount }}</strong>
        </div>
        <div class="profile">
          <img src="https://via.placeholder.com/48" alt="প্রোফাইল পিক">
          <div>
            <strong>🎖️ {{ $loop->iteration }}তম গ্লোবাল বোনাস আর্জনের সময় :</strong><br>
            <small>তারিখ: {{ $bonus->created_at->format('d-m-Y h:i A') }}</small>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

{{-- JS --}}
<script>
  function showTab(tabId) {
    document.getElementById("bonusTab").classList.add("hidden");
    document.getElementById("referTab").classList.add("hidden");
    document.getElementById("historyTab").classList.add("hidden");
    document.getElementById(tabId).classList.remove("hidden");
  }
  </script>



@endsection