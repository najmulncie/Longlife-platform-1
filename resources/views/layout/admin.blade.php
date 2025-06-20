<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

   
   <style>
        .rotate-down {
            transform: rotate(0deg);
            transition: transform 0.3s;
        }
        .rotate-up {
            transform: rotate(180deg);
            transition: transform 0.3s;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-blue-900 text-white transform -translate-x-full transition-transform duration-300 z-50">
      
<!-- Sidebar Header -->
<div class="flex items-center justify-between px-4 py-2 bg-blue-900 text-white border-b border-blue-700">
    <span class="text-lg font-semibold">Menu</span>
    <button onclick="toggleSidebar()" class="bg-white text-blue-900 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
        <i class="fas fa-times"></i>
    </button>
</div>

<nav class="p-4">
    <ul class="space-y-2">
        <!-- 1. Dashboard -->
        <li>
            <a href="/admin/dashboard" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>

        <!-- 2. Users submenu -->
      <li>
    <button onclick="toggleMenu('usersSubmenu', 'usersArrow')" class="flex items-center justify-between w-full hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-users"></i> <span>Users</span>
        </div>
        <i id="usersArrow" class="fas fa-chevron-down rotate-down"></i>
    </button>
    <ul id="usersSubmenu" class="ml-6 mt-1 space-y-1 hidden">
        <li>
            <a href="{{ route('admin.users.active') }}" class="flex items-center justify-between gap-2 hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2"><i class="fas fa-user-check"></i> Active Users</div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.inactive') }}" class="flex items-center justify-between gap-2 hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2"><i class="fas fa-user-times"></i> InActive Users</div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.banned') }}" class="flex items-center justify-between gap-2 hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2"><i class="fas fa-user-slash"></i> Banned Users</div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="/admin/users" class="flex items-center justify-between gap-2 hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2"><i class="fas fa-users-cog"></i> Total Users</div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</li>

        <!-- 3. Referral Commission -->
      <!-- 3. Referral Commission with submenu -->
<li>
    <button onclick="toggleMenu('commissionSubmenu', 'commissionArrow')" class="flex items-center justify-between w-full hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-hand-holding-usd"></i> <span>Referral Commission</span>
        </div>
        <i id="commissionArrow" class="fas fa-chevron-down rotate-down"></i>
    </button>
    <ul id="commissionSubmenu" class="ml-6 mt-1 space-y-1 hidden">
        <li>
            <a href="/admin/fixed-commissions" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded"> 
                <div class="flex items-center gap-2">
                    <i class="fas fa-bolt"></i> Active Commission
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="/admin/commissions" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded"> 
                <div class="flex items-center gap-2">
                    <i class="fas fa-leaf"></i> Passive Commission
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</li>


        <!-- 4. Payment Method -->
        <li>
            <a href="/admin/payment-settings" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded"> 
                <div class="flex items-center gap-2">
                    <i class="fas fa-credit-card"></i> <span>Payment Method</span>
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>

        <!-- 5. Payment Request with submenu -->
        <li>
            <button onclick="toggleMenu('paymentRequestSubmenu', 'paymentRequestArrow')" class="flex items-center justify-between w-full hover:bg-blue-700 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-file-invoice-dollar"></i> Payment Request
                </div>
                <i id="paymentRequestArrow" class="fas fa-chevron-down rotate-down"></i>
            </button>
            <ul id="paymentRequestSubmenu" class="ml-6 mt-1 space-y-1 hidden">
                <li>
                     

<a href="{{ route('admin.activation.requests.pending') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">  
                        <div class="flex items-center gap-2">
                            <i class="fas fa-hourglass-half"></i> Pending Request
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.activation.requests.approved') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle"></i> Approved Request
                        </div>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.activation.requests.rejected') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-times-circle"></i> Rejected Request
                        </div>



                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 6. Withdraw Method -->
<li>
    <a href="/admin/withdraw-settings" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded"> 
        <div class="flex items-center gap-2">
            <i class="fas fa-university"></i> <span>Withdraw Method</span>
        </div>
        <i class="fas fa-chevron-right"></i>
    </a>
</li>

<!-- 7. Withdraw Request with submenu -->
<li>
    <button onclick="toggleMenu('withdrawRequestSubmenu', 'withdrawRequestArrow')" class="flex items-center justify-between w-full hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-money-bill-wave"></i> Withdraw Request
        </div>
        <i id="withdrawRequestArrow" class="fas fa-chevron-down rotate-down"></i>
    </button>
    <ul id="withdrawRequestSubmenu" class="ml-6 mt-1 space-y-1 hidden">
        <li>
            <a href="{{ route('admin.withdraw.pending') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-hourglass-half"></i> Pending Request
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.withdraw.approved') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i> Approved Request
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.withdraw.rejected') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-times-circle"></i> Rejected Request
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="/admin/targets" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-bullseye"></i> <span>Target Bonus Plan</span>
        </div>
        <i class="fas fa-chevron-right"></i>
    </a>
</li>

<li>
    <a href="/admin/leadership-levels" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-crown"></i> <span>Leadership Plan</span>
        </div>
        <i class="fas fa-chevron-right"></i>
    </a>
</li>

<li>
    <a href="/admin/gmail-setting" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-envelope"></i> <span>Gmail Settings</span>
        </div>
        <i class="fas fa-chevron-right"></i>
    </a>
</li>


<li>
    <button onclick="toggleMenu('gmailSalesSubmenu', 'gmailSalesArrow')" class="flex items-center justify-between w-full hover:bg-blue-700 p-2 rounded">
        <div class="flex items-center gap-2">
            <i class="fas fa-envelope"></i> Gmail Sales
        </div>
        <i id="gmailSalesArrow" class="fas fa-chevron-down rotate-down"></i>
    </button>
    <ul id="gmailSalesSubmenu" class="ml-6 mt-1 space-y-1 hidden">
        <li>
            <a href="/admin/gmail-sales" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-list"></i> All Gmail Sales
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>


        <li>
            <a href="{{ route('admin.gmail.sales.pending') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-hourglass-half"></i> Pending Gmails
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gmail.sales.checked') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check"></i> Checked Gmails
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gmail.sales.completed') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle"></i> Completed Gmails
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.gmail.sales.rejected') }}" class="flex items-center justify-between hover:bg-blue-800 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-times-circle"></i> Rejected Gmails
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</li>

        <!-- 6. Log Out -->
        <li>
            <a href="#" class="flex items-center justify-between hover:bg-blue-700 p-2 rounded">
                <div class="flex items-center gap-2">
                    <i class="fas fa-sign-out-alt"></i> <span>Log Out</span>
                </div>
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    </ul>
</nav>





    </div>

    <header class="bg-blue-800 text-white shadow-md px-4 py-2">
    <div class="flex items-center justify-between gap-2">

        <!-- Left: Hamburger + Site Name -->
        <div class="flex items-center gap-2 min-w-fit">
            <button onclick="toggleSidebar()" class="text-2xl">
                <i class="fas fa-bars"></i>
            </button>
            <span class="text-base font-bold whitespace-nowrap">LONG LIFE</span>
        </div>

       <!-- Right: Search + Profile -->
<div class="flex items-center gap-2">
    <!-- Search Bar -->
    <!-- <form method="GET" action="{{ route('admin.users.search') }}">
        <input type="text" name="query" placeholder="Search Users"
               class="w-28 sm:w-36 md:w-48 lg:w-64 px-2 py-1 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </form> -->


    <form method="GET" action="{{ route('admin.users.search') }}">
    <input 
        type="text" 
        name="query" 
        value="{{ request('query') }}"
        placeholder="Searce Users"
        class="w-28 sm:w-36 md:w-48 lg:w-64 px-2 py-1 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-blue-500" 
        autocomplete="off"
    />
</form>


    <!-- Profile Icon -->
    <div class="relative">
        <button onclick="toggleProfileMenu()" class="focus:outline-none w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-900 shadow">
            <i class="fas fa-user-circle text-xl"></i>
        </button>
        <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg hidden z-50">
            <a href="/admin/profile" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-200">
                <i class="fas fa-user-circle w-5"></i> <span>Profile</span>
            </a>
            <a href="{{ route('admin.password.form') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-200">
                <i class="fas fa-key w-5"></i> <span>Change Password</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 hover:bg-gray-200">
                    <i class="fas fa-sign-out-alt w-5"></i> <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>

    </div>
</header>
   
    <!-- Main content -->
    <main class="p-4 mt-4">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

       
        function toggleMenu(submenuId, arrowId) {
            const submenu = document.getElementById(submenuId);
            const arrow = document.getElementById(arrowId);
            submenu.classList.toggle('hidden');
            arrow.classList.toggle('rotate-down');
            arrow.classList.toggle('rotate-up');
        }

        document.addEventListener('click', function(event) {
            const profileBtn = document.querySelector('.fa-user-circle');
            const dropdown = document.getElementById('profileDropdown');
            if (!profileBtn.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>


<script>
    function toggleProfileMenu() {
        document.getElementById('profileDropdown').classList.toggle('hidden');
    }

    // ক্লিক বাইরে করলে প্রোফাইল ড্রপডাউন বন্ধ
    document.addEventListener('click', function (e) {
        const profileDropdown = document.getElementById('profileDropdown');
        const profileButton = profileDropdown.previousElementSibling;
        if (!profileDropdown.contains(e.target) && !profileButton.contains(e.target)) {
            profileDropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>