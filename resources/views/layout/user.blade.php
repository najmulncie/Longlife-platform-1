<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
  
  <style>
    * {margin: 0; padding: 0; box-sizing: border-box;}
    body {
      font-family: sans-serif;
      padding-top: 60px;
      padding-bottom: 60px;
      background: #f4f6f9;
    }

    /* Header */
    .main-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 65px;
      /* background-color: #007bff; */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));

      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    .menu-toggle {
      font-size: 28px;
      cursor: pointer;
    }

    .app-title {
      font-size: 20px;
      font-weight: bold;
      letter-spacing: 1px;
    }

.notification {
  font-size: 28px; /* বড় আইকন সাইজ */
  cursor: pointer;
  color: #fff;
}

.close-notice {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #ff4d4f;
  color: white;
  border: none;
  border-radius: 50%;
  width: 35px;
  height: 35px;
  font-size: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.close-notice:hover {
  background-color: #ff1a1a;
  transform: scale(1.1);
}

.notification-popup {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.9);
  background: linear-gradient(145deg, #ffffff, #f0f0f0);
  border: 3px solid #007bff;
  padding: 25px;
  border-radius: 15px;
  width: 90%;
  max-width: 500px;
  box-shadow: 0 10px 30px rgba(0, 123, 255, 0.4);
  z-index: 1100;
  animation: fadeInPopup 0.4s ease-out forwards;
}

@keyframes fadeInPopup {
  from {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.7);
  }
  to {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}

.notice-banner img {
  width: 100%;
  border-radius: 10px;
  margin-bottom: 15px;
}

.notice-content {
  text-align: center;
  font-family: 'Segoe UI', sans-serif;
  font-size: 15px;
  color: #333;
  line-height: 1.6;
}

.notice-content strong {
  font-size: 20px;
  color: #dc3545;
  display: block;
  margin-bottom: 10px;
}

.notice-content a {
  color: #007bff;
  font-weight: bold;
  text-decoration: none;
}

.notice-content a:hover {
  text-decoration: underline;
}

.notification-close {
  position: absolute;
  top: 12px;
  right: 15px;
  font-size: 22px;
  font-weight: bold;
  color: #333;
  cursor: pointer;
  transition: 0.3s ease;
}

.notification-close:hover {
  color: #dc3545;
  transform: scale(1.2);
}
    
    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      /* background: #0056b3; */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));

      color: white;
      transition: 0.3s ease-in-out;
      z-index: 1002;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 20px;
      /* background: #004494; */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));

      /* color: #00cfff; */
      color:rgb(248, 249, 250);
      font-weight: bold;
      font-size: 18px;
      border-bottom: 1px solid #2c3e50;
      position: sticky; /* Sticky header */
      top: 0;
      z-index: 1002;
    }

   




.profile-name {
  margin: 10px 0 4px;
  font-size: 20px;
  font-weight: 600;
  color: #fff;
}

.profile-info {
  font-size: 15px;
  color: #ddd;
  margin: 4px 0;
}

.profile {
  text-align: center;
  padding: 10px 10px 10px; /* নিচের ফাঁকা জায়গা কমানো হয়েছে */
  margin-bottom: 0;
}

.profile-img-wrap {
  position: relative;
  display: inline-block;
  padding: 6px;
  background: linear-gradient(135deg, #00cfff, #003477);
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.profile-img-wrap img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 3px solid white;
}


.profile-name {
  font-size: 16px;
  font-weight: bold;
  margin: 10px 0 5px;
}

.profile-info {
  font-size: 14px;
  margin: 3px 0;
}

.account-status-box {
  background: #1e293b;
  color: white;
  border-radius: 10px;
  padding: 6px 10px;
  display: inline-block;
  margin-top: 8px;
  font-size: 13px;
  box-shadow: inset 0 0 6px rgba(0, 207, 255, 0.3);
}

.status-active {
  color: limegreen;
  font-weight: bold;
  margin-left: 5px;
}

.status-inactive {
  color: red;
  font-weight: bold;
  margin-left: 5px;
}

    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 10px 0;
      overflow-y: auto;
    }

    .sidebar-menu li {
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .sidebar-menu li a {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar-menu li a:hover {
      background: #003477;
      color: #00cfff;
    }

    .menu-text {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar-menu i {
      width: 20px;
      text-align: center;
    }

    .arrow {
      font-size: 25px;
      color: white;
      opacity: 0.7;
      min-width: 10px;
      text-align: right;
    }
    
    .has-submenu .submenu {
  display: none;
  background: #0056b3;
}

.has-submenu.open .submenu {
  display: block;
}

.submenu li a {
  padding: 10px 40px;
  background-color: #002040;
}

.submenu li a:hover {
  background-color: #003477;
  color: #00cfff;
}

.submenu {
  display: none;
  padding-left: 10px;
}

.submenu li {
  border-bottom: 1px solid rgba(255,255,255,0.05);
}

.submenu a {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%; /* VERY IMPORTANT */
  padding: 12px 20px;
  color: white;
  text-decoration: none;
  transition: 0.3s;
}

.submenu a:hover {
  background: #003477;
  color: #00cfff;
}

.submenu .arrow {
  font-size: 20px;
  color: white;
  opacity: 0.7;
}
    

.sidebar-header span:last-child {
  background-color: #007bff; /* নতুন ব্যাকগ্রাউন্ড কালার */
  padding: 8px 12px; /* একটু বড় প্যাডিং */
  border-radius: 5px;
  font-size: 25px; /* বড় ফন্ট সাইজ */
  line-height: 25px;
  cursor: pointer; /* কুরসরের পরিবর্তন */
  transition: background-color 0.3s, transform 0.3s;
}

.sidebar-header span:last-child:hover {
  background-color: #00cfff; /* হোভার হলে কালার পরিবর্তন */
  transform: scale(1.1); /* হোভার করলে আকার বড় হবে */
}

    /* Footer */
    .main-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 60px;
      /* background: #007bff; */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));

      display: flex;
      justify-content: space-around;
      align-items: center;
      color: white;
      z-index: 1000;
      box-shadow: 0 -2px 5px rgba(0,0,0,0.3);
    }

    .main-footer .footer-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 13px;
      text-decoration: none;
      color: white;
      transition: color 0.2s ease, transform 0.2s ease;
    }

    .main-footer .footer-item:hover {
      color: #00cfff;
      transform: scale(1.1);
    }

    .main-footer i {
      font-size: 22px;
      margin-bottom: 3px;
    }

    

    /* .content {
      padding: 20px;
    } */
  </style>
  
  <style>
  .copy-btn {
    background: #00cfff;
    border: none;
    color: white;
    padding: 4px 8px;
    margin-left: 6px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 13px;
    transition: 0.3s;
  }

  .copy-btn:hover {
    background: #0099cc;
  }
</style>
  
</head>
<body>

  <div class="main-header">
    <div style="display: flex; align-items: center; gap: 12px; top-0">
      <i class="fas fa-bars menu-toggle" onclick="toggleSidebar()"></i>
      <span class="app-title">LONG LIFE</span>
    </div>
    <i class="fas fa-bell notification" onclick="toggleNotification()"></i>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <span>মেনু</span>
      <span onclick="toggleSidebar()" style="cursor:pointer">&times;</span>
    </div>

<div class="profile">
  <div class="profile-img-wrap">
<img 
  src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}" 
  alt="Profile Pic" 
  class="img-fluid rounded-circle" 
  style="width: 120px; height: 120px; object-fit: cover;">
</div>

  <p class="profile-name mt-2">{{ Auth::user()->name }}</p>

  <p class="profile-info">
    <strong>AFFILIATE ID:</strong>
   <span id="referralCode">{{ Auth::user()->referral_code ?? '123456' }}</span>

    <button onclick="copyReferralCode()" class="copy-btn btn btn-sm btn-outline-secondary ms-1"><i class="fas fa-copy"></i></button>
  </p>

 


  <p class="profile-info">
    <strong>JOINED:</strong> {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') }}
  </p>

@php
    $user = Auth::user();
@endphp

<div class="mt-2 px-4 py-1 rounded-full text-white font-semibold inline-block"
     style="background: linear-gradient(to right, #7f00ff, #00c6ff); box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
    Account Status:
    @if($user && $user->is_active == 1)
        <span class="text-green-300">Active</span>
    @else
        <span class="text-red-300">Inactive</span>
    @endif
</div>



</div>



    <ul class="sidebar-menu">
  <li><a href="{{ route('dashboard') }}"><span class="menu-text"><i class="fas fa-home"></i> হোম</span><span class="arrow">&gt;</span></a></li>
  <li><a href="{{ route('layout.vouchar-balance') }}"><span class="menu-text"><i class="fas fa-home"></i> ভাউচার ব্যালেন্স </span><span class="arrow">&gt;</span></a></li>

   <!-- Settings Dropdown -->
  <li class="has-submenu">
    <a href="javascript:void(0);" onclick="toggleSubMenu(this)">
      <span class="menu-text"><i class="fas fa-cog"></i> সেটিংস</span>
      <span class="arrow">▾</span>
    </a>
    <ul class="submenu">
      <li>
        <a href="/profile">
          <span class="menu-text"><i class="fas fa-user"></i> প্রোফাইল</span>
          <span class="arrow">&gt;</span>
        </a>
      </li>
      <li>
        <a href="{{ route('user.change.password') }}">
          <span class="menu-text"><i class="fas fa-key"></i> পাসওয়ার্ড চেঞ্জ</span>
          <span class="arrow">&gt;</span>
        </a>
      </li>
    </ul>
  </li>

  <li><a href="/update"><span class="menu-text"><i class="fas fa-question-circle"></i> হেল্প সেন্টার</span><span class="arrow">&gt;</span></a></li>
  <li><a href="https://t.me/longlife_network"><span class="menu-text"><i class="fab fa-telegram"></i> টেলিগ্রাম গ্রুপ</span><span class="arrow">&gt;</span></a></li>
  <li><a href="https://www.facebook.com/groups/1622628365105599/?ref=share&mibextid=NSMWBT"><span class="menu-text"><i class="fab fa-facebook"></i> ফেসবুক গ্রুপ</span><span class="arrow">&gt;</span></a></li>
  
  <li><a href="#"><span class="menu-text"><i class="fas fa-user-cog"></i> ডেভেলপার কন্টাক্ট</span><span class="arrow">&gt;</span></a></li>
  <li><a href="/update"><span class="menu-text"><i class="fas fa-shield-alt"></i> প্রাইভেসি পলিসি</span><span class="arrow">&gt;</span></a></li>
  <li><a href="/update"><span class="menu-text"><i class="fas fa-star"></i> রেটিং & রিভিউ</span><span class="arrow">&gt;</span></a></li>

 

  <li>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="menu-text">
            <i class="fas fa-sign-out-alt"></i> লগ আউট
        </span>
        <span class="arrow">&gt;</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>


    
  </div>

  <div class="content">
    @yield('content')
  </div>

  <div class="main-footer">
    <a class="footer-item" href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>হোম</span></a>
    <a class="footer-item" href="/update"><i class="fas fa-book"></i><span>কোর্স</span></a>
    <a class="footer-item" href="{{ route('wallet') }}"><i class="fas fa-coins"></i><span>ইনকাম</span></a>
    <a class="footer-item" href="/my-team"><i class="fas fa-users"></i><span>নেটওয়ার্ক</span></a>
  </div>

<div class="notification-popup" id="notification">
  <button class="close-notice" onclick="closeNotification()">×</button>
  <div class="notice-banner">
    <img src="{{ asset('backend/images/notice.png') }}" alt="Notice Banner">
  </div>
  <div class="notice-content">
    <strong>জরুরি নোটিশ:</strong>
    <p>আজ বিকাল ৩ টা ই আমাদের অফিসিয়াল টেলিগ্রাম গ্রুপে গুরুত্বপূর্ণ মিটিং হবে। সকলে জয়েন থাকুন।</p>
    <p><a href="https://t.me/longlife_network" target="_blank">টেলিগ্রাম গ্রুপে জয়েন করুন</a></p>
    
  </div>
</div>
  
  <script>
  function copyReferralCode() {
    const code = document.getElementById("referralCode").textContent.trim();
    const textarea = document.createElement("textarea");
    textarea.value = code;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
    alert("Affiliate ID copied to clipboard!");
  }
</script>
  
  <script>
function toggleSubMenu(element) {
  var submenu = element.nextElementSibling;
  submenu.style.display = submenu.style.display === "block" ? "none" : "block";
}
</script>
  
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
    }
    function toggleNotification() {
      const noti = document.getElementById('notification');
      noti.style.display = noti.style.display === 'block' ? 'none' : 'block';
    }
  </script>

<script>
function closeNotification() {
  document.getElementById('notification').style.display = 'none';
}
</script>



</body>
</html>