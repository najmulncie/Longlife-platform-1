@extends('layout.user')
@section('title', 'Vouchar Balance')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Noto Sans Bengali', sans-serif;
    }
    
    .hidden { display: none; }
    .top-card {
      /* background: linear-gradient(135deg, #007bff, #00bcd4); */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));
      border-radius: 15px;
      color: #fff;
      padding: 25px;
      text-align: center;
      margin-bottom: 25px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .top-card .icon {
      font-size: 45px;
      margin-bottom: 10px;
    }
    .top-card .title {
      font-size: 20px;
      margin-bottom: 6px;
    }
    .top-card .amount {
      font-size: 28px;
      font-weight: bold;
    }
    .menu-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #ffffff;
      border-left: 5px solid #1976d2;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .menu-item:hover {
      transform: scale(1.01);
    }
    .menu-item .left {
      display: flex;
      align-items: center;
    }
    .menu-item .icon {
      font-size: 22px;
      color: #1976d2;
      margin-right: 12px;
    }
    .menu-item .text {
      font-size: 17px;
      color: #333;
    }
    .menu-item .arrow {
      font-size: 20px;
      color: #007bff;
    }
    .back-button {
      background-color: #1976d2;
      color: #fff;
      padding: 10px 16px;
      border-radius: 8px;
      display: inline-block;
      margin-bottom: 20px;
      cursor: pointer;
      font-size: 16px;
    }
    .page-title {
      font-size: 22px;
      margin-bottom: 20px;
      color: #1976d2;
      font-weight: bold;
    }
    .page {
      animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    input, select {
      width: 100%;
      padding: 14px;
      margin-bottom: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }
    button {
      width: 100%;
      background: #007bff;
      color: #fff;
      padding: 14px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .card {
      background: #fff;
      border-left: 4px solid #1976d2;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .history-box {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 10px;
    }
  </style>


  <!-- হোম পেজ -->
  <div id="homePage" class="page">
    <div class="top-card">
      <div class="icon">💸</div>
      <div class="title">ভাউচার ব্যালেন্স</div>
        <div class="amount">৳ <span id="balance">{{ auth()->user()->voucher_balance ?? '০০' }}</span>
        </div>
    </div>
    <div class="menu-item" onclick="goToPage('add')">
      <div class="left"><div class="icon">💰</div><div class="text">ভাউচার ব্যালেন্স এড করুন</div></div><div class="arrow">➔</div>
    </div>
    <div class="menu-item" onclick="goToPage('withdraw')">
      <div class="left"><div class="icon">📤</div><div class="text">ভাউচার ব্যালেন্স উত্তোলন করুন</div></div><div class="arrow">➔</div>
    </div>
    <div class="menu-item" onclick="goToPage('withdrawHistory')">
      <div class="left"><div class="icon">📜</div><div class="text">ভাউচার ব্যালেন্স | উত্তোলনের হিস্ট্রি</div></div><div class="arrow">➔</div>
    </div>
    <div class="menu-item" onclick="goToPage('transaction')">
      <div class="left"><div class="icon">📊</div><div class="text">ভাউচার ব্যালেন্স | ট্রানজেকশন হিস্ট্রি</div></div><div class="arrow">➔</div>
    </div>
  </div>

  <!-- এড পেজ -->
  <div id="add" class="page hidden">
    <div class="back-button" onclick="goHome()">← ফিরে যান</div>
    <div class="page-title">ভাউচার ব্যালেন্স এড করুন</div>
    <div class="card">
      <label for="amountInput">এমাউন্ট লিখুন</label>
      <input type="number" id="amountInput" placeholder="এমাউন্ট (৳)" min="20" max="50000" />
      <button onclick="confirmAdd()">পেমেন্ট করুন</button>
      <p style="font-size:14px;text-align:center;color:#555;margin-top:8px;">সর্বনিম্ন ২০ টাকা এবং সর্বোচ্চ ৫০,০০০ টাকা</p>
    </div>
  </div>

  <!-- উত্তোলন পেজ -->
  <div id="withdraw" class="page hidden">
    <div class="back-button" onclick="goHome()">← ফিরে যান</div>
    <div class="page-title">ভাউচার ব্যালেন্স উত্তোলন</div>
    <div class="card">
      <label for="method">মাধ্যম</label>
      <select id="method">
        <option value="নগদ">নগদ</option>
        <option value="বিকাশ">বিকাশ</option>
        <option value="রকেট">রকেট</option>
      </select>
      <label for="withdrawNumber">নাম্বার</label>
      <input type="text" id="withdrawNumber" maxlength="11" placeholder="নাম্বার" />
      <label for="withdrawAmount">এমাউন্ট</label>
      <input type="number" id="withdrawAmount" placeholder="এমাউন্ট (৳)" min="200" max="250000" />
      <button onclick="confirmWithdraw()">উত্তোলন করুন</button>
      <p style="font-size:14px;text-align:center;color:#555;margin-top:8px;">সর্বনিম্ন ২০০ এবং সর্বোচ্চ ২৫০,০০০ টাকা। ২% চার্জ প্রযোজ্য।</p>
    </div>
  </div>

  <!-- উত্তোলনের হিস্ট্রি -->
  <div id="withdrawHistory" class="page hidden">
    <div class="back-button" onclick="goHome()">← ফিরে যান</div>
    <div class="page-title">ভাউচার ব্যালেন্স | উত্তোলনের হিস্ট্রি</div>
    <div id="withdrawList"></div>
  </div>

  <!-- ট্রানজেকশন হিস্ট্রি -->
  <div id="transaction" class="page hidden">
    <div class="back-button" onclick="goHome()">← ফিরে যান</div>
    <div class="page-title">ভাউচার ব্যালেন্স | ট্রানজেকশন হিস্ট্রি</div>
    <div id="transactionList"></div>
  </div>

  <script>
    let totalBalance = parseFloat(document.getElementById('balance').textContent) || 0;
    let withdrawHistory = [];
    let transactionHistory = [];
    
    
    
    function goToPage(pageId) {
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      document.getElementById(pageId).classList.remove('hidden');
      if (pageId === 'withdrawHistory') showWithdrawHistory();
      if (pageId === 'transaction') showTransactionHistory();
    }

    function goHome() {
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      document.getElementById('homePage').classList.remove('hidden');
    }

    
    
   function confirmAdd() {
      const amount = parseInt(document.getElementById('amountInput').value);
      if (isNaN(amount) || amount < 20 || amount > 50000) {
        alert('২০ থেকে ৫০,০০০ এর মধ্যে একটি এমাউন্ট দিন।');
        return;
      }
    
      fetch("{{ route('voucher.initiate') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ amount: amount })
      })
      .then(res => res.json())
      .then(data => {
        if (data.payment_url) {
            window.location.href = data.payment_url;
        } else {
            alert('পেমেন্ট শুরু করা যায়নি!');
            console.log(data);
        }
      })
      .catch(err => {
        console.error(err);
        alert('পেমেন্ট রিকুয়েস্টে সমস্যা হয়েছে!');
      });
    }



    function confirmWithdraw() {
      const amount = parseFloat(document.getElementById('withdrawAmount').value);
      const method = document.getElementById('method').value;
      const number = document.getElementById('withdrawNumber').value.trim();
      if (!/^\d{11}$/.test(number)) return alert('১১ সংখ্যার সঠিক নাম্বার দিন।');
      if (isNaN(amount) || amount < 200 || amount > 250000) return alert('২০০ থেকে ২৫০,০০০ টাকার মধ্যে দিন।');

      const charge = amount * 0.02;
      const received = amount - charge;
      const status = amount <= totalBalance ? 'সফল ✅' : 'ব্যর্থ ❌';
      if (amount <= totalBalance) totalBalance -= amount;
      document.getElementById('balance').textContent = totalBalance;

      withdrawHistory.push({ number, method, amount, charge, received, status, time: new Date().toLocaleString('bn-BD') });
      alert(`${method} এর মাধ্যমে উত্তোলন ${status}\n৳${amount}`);
      document.getElementById('withdrawAmount').value = '';
      document.getElementById('withdrawNumber').value = '';
    }

    function showWithdrawHistory() {
      const list = document.getElementById('withdrawList');
      list.innerHTML = withdrawHistory.length === 0 ? "<p style='text-align:center;color:#777;'>হিস্ট্রি নেই</p>" : '';
      withdrawHistory.slice().reverse().forEach(entry => {
        const div = document.createElement('div');
        div.className = "history-box";
        div.style.borderLeft = `4px solid ${entry.status === 'সফল ✅' ? '#4caf50' : '#f44336'}`;
        div.style.backgroundColor = entry.status === 'সফল ✅' ? '#e8f5e9' : '#ffebee';
        div.innerHTML = `
          <strong>নাম্বার:</strong> ${entry.number}<br>
          <strong>মাধ্যম:</strong> ${entry.method}<br>
          <strong>উত্তোলন:</strong> ৳${entry.amount} | চার্জ: ৳${entry.charge.toFixed(2)}<br>
          <strong>প্রাপ্তি:</strong> ৳${entry.received.toFixed(2)}<br>
          <strong>স্ট্যাটাস:</strong> ${entry.status}<br>
          <small>${entry.time}</small>`;
        list.appendChild(div);
      });
    }

    function showTransactionHistory() {
      const list = document.getElementById('transactionList');
      list.innerHTML = transactionHistory.length === 0 ? "<p style='text-align:center;color:#777;'>কোন ট্রানজেকশন নেই</p>" : '';
      transactionHistory.slice().reverse().forEach(entry => {
        const div = document.createElement('div');
        div.className = "history-box";
        div.style.borderLeft = "4px solid #2196f3";
        div.style.backgroundColor = "#e3f2fd";
        div.innerHTML = `
          <strong>এমাউন্ট:</strong> ৳${entry.amount}<br>
          <strong>ট্রানজেকশন আইডি:</strong> ${entry.transactionId}<br>
          <small>${entry.time}</small>`;
        list.appendChild(div);
      });
    }
  </script>
<!--  -->


@endsection