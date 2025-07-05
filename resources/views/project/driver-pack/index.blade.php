@extends('layout.user')


@section('content')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap');
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Noto Sans Bengali', sans-serif;
    }
    body { background-color: #eaf4fb; padding: 20px; }
    .main-card {
      background: linear-gradient(135deg, #00b894, #55efc4);
      border-radius: 18px;
      padding: 25px 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      margin-bottom: 15px;
      margin-top: 70px;
      text-align: center;
      color: #ffffff;
    }
    .main-card h2 { font-size: 22px; margin-bottom: 10px; }
    .main-card p { font-size: 16px; }

    .balance-panel {
      display: flex;
      gap: 15px;
      margin-top: 45px;
      margin-bottom: 15px;
    }
    .balance-card {
      flex: 1;
      background: #ffffff;
      border-radius: 12px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
    .balance-card h4 { margin-bottom: 5px; font-size: 16px; color: #636e72; }
    .balance-card p { font-size: 22px; font-weight: bold; color: #0984e3; }

    .history-card {
      background-color: #ffffff;
      border-left: 6px solid #00cec9;
      border-radius: 12px;
      padding: 18px 20px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      text-align: center;
      margin-bottom: 20px;
      cursor: pointer;
    }
    .history-card h3 { color: #2d3436; font-size: 18px; }

    .sim-buttons {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(132px, 1fr));
      gap: 10px;
      margin-bottom: 20px;
    }
    .sim-btn {
      padding: 10px 5px;
      border-radius: 10px;
      text-align: center;
      color: #fff;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }
    .gp { background-color: #0078db; }
    .robi { background-color: #f5115b; }
    .banglalink { background-color: #ff6f00; }
    .airtel { background-color: #b0002a; }
    .teletalk { background-color:rgb(163, 12, 156); }
 
    .sim-btn.active {
      border: 3px solid #fff;
      box-shadow: 0 0 10px #000;
      transform: scale(1.05);
    }
    .packages { display: none; flex-direction: column; gap: 15px; }
    .package-card {
      background-color: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      position: relative;
    }
    .new-tag {
      position: absolute; top: 10px; right: 10px;
      background: #00b894; color: #fff; padding: 3px 8px;
      font-size: 12px; border-radius: 5px;
    }
    .package-card h4 { font-size: 18px; margin-bottom: 8px; }
    .package-card p { font-size: 14px; margin-bottom: 5px; }
    .package-footer {
      display: flex; justify-content: space-between; align-items: center;
      margin-top: 12px;
    }
    .price {
      font-size: 20px; color: #0984e3; font-weight: bold; float: left;
    }
    .buy-btn {
      padding: 8px 12px; background-color: #0984e3;
      color: #fff; border: none; border-radius: 8px;
      font-size: 14px; font-weight: bold; cursor: pointer; float: right;
    }
    #package-area .package-card:last-child {
      margin-bottom: 50px;
    }
    .buy-btn:hover { background-color: #0769ba; }

    #popup { display: none; }
    #popup-overlay {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      display: flex; justify-content: center; align-items: center;
      z-index: 999;
    }
    #popup-box {
      background: #fff; width: 90%; max-width: 400px;
      padding: 20px; border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2); position: relative; margin-top:40px;
    }
    #popup-box h3 { color: #00b894; margin-bottom: 10px; }
    #popup-box input {
      width: 100%; padding: 10px; border: 1px solid #ccc;
      border-radius: 8px; margin-bottom: 12px; font-size: 16px;
    }
    #popup-box button {
      background-color: #0984e3; color: white; padding: 10px 15px;
      border: none; border-radius: 8px; font-size: 16px;
      width: 100%; font-weight: bold; cursor: pointer;
    }
    #popup-close {
      position: absolute; top: 8px; right: 12px;
      cursor: pointer; font-weight: bold; font-size: 18px; color: #d63031;
    }

    #history-section { display: none; }
    .history-entry {
      background-color: #ffffff;
      border-left: 6px solid #00cec9;
      border-radius: 12px;
      padding: 15px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 15px;
    }
    .history-entry.failed { border-left-color: #d63031; }
  </style>


  <div class="main-card">
    <h2>দারুন সব স্পেশাল প্যাক</h2>
    <p>কিনুন-বেচুন, আর ঘরে বসেই আয় করুন আকর্ষণীয় কমিশনে!</p>
  </div>

  <div class="balance-panel">
      <div class="balance-card">
        <h4>ভাউচার ব্যালেন্স</h4>
        <p>৳<span id="voucher-balance"> {{ $user->voucher_balance }}</span></p>
      </div>
      <div class="balance-card">
        <h4>বর্তমান ব্যালেন্স</h4>
        <p>৳<span id="current-balance"> {{ $user->balance }}</span></p>
      </div>
    </div>

    <div class="history-card">
      <a href="{{ route('driver-pack.history') }}">
        <h3> ← ড্রাইভার প্যাকেজ ক্রয়ের হিস্ট্রি দেখুন </h3>
      </a>
    </div>

  <div class="sim-buttons">
    @foreach ($simOperators as $operator)
      <div class="sim-btn"
          data-sim="{{ $operator->key }}"
          style="background-color: {{ $colorMap[$operator->key] ?? '#3498db' }};">
        {{ $operator->name }}
      </div>
    @endforeach
  </div>


  <div id="package-area" class="packages"></div>

  <div id="popup">
    <div id="popup-overlay">
      <div id="popup-box">
        <div id="popup-close" onclick="closePopup()">✖</div>
        <h3>🚗 ড্রাইভার বিবরণ</h3>
        <div id="popup-offer-details" style="margin-bottom: 10px;"></div>
        <div style="background: #eaf4fb; padding: 10px; border-radius: 8px; margin-bottom: 10px;">
          ⏰ ড্রাইভার অফার প্রতিদিন সকাল ১০টা থেকে রাত ৯টা পর্যন্ত চালু। <br> শুক্রবার বন্ধ থাকবে।
        </div>
        <div style="margin-bottom: 10px;">
          <strong>সিম: </strong><span id="selected-sim-name"></span>
        </div>
        <input type="tel" id="user-number" placeholder="আপনার নাম্বার লিখুন" />
        <button onclick="confirmPurchase()">ক্রয় নিশ্চিত করুন</button>
      </div>
    </div>
  </div>

  <div id="history-section">
    <div style="margin-bottom: 15px;">
      <button onclick="backToMain()" style="
        background-color: #d63031; color: white; padding: 8px 14px;
        border: none; border-radius: 8px; font-size: 14px; font-weight: bold;
      ">← ব্যাক</button>
    </div>

    <h3 style="text-align:center; color:#2d3436; margin-bottom: 15px;">📜 ড্রাইভার প্যাকেজ ক্রয়ের হিস্ট্রি</h3>
  </div>


  <script>
    const packages = @json($packagesJson);
    console.log(packages);

    let currentSim = "";
    let currentPackage = null;


    document.addEventListener("DOMContentLoaded", function () {
      const buttons = document.querySelectorAll('.sim-btn');

          buttons.forEach(button => {
              button.addEventListener('click', function () {
                  const sim = this.getAttribute('data-sim');
                  showPackages(sim);

                  buttons.forEach(btn => btn.classList.remove('active'));
                  this.classList.add('active');
              });
          });
      });

    function showPackages(sim) {
      currentSim = sim;
      document.getElementById("selected-sim-name").innerText = sim;

      const packageArea = document.getElementById("package-area");
      packageArea.innerHTML = "";

      if (!packages[sim] || packages[sim].length === 0) {
        packageArea.innerHTML = `<p style="color: red;"> প্যাকেজ এভেইলেবল নাই! </p>`;
        packageArea.style.display = "block";
        return;
      }

      packageArea.style.display = "flex";
      packages[sim].forEach(pkg => {
        const card = document.createElement("div");
        card.className = "package-card";
        card.innerHTML = `
          <div class="new-tag">New</div>
          <h4>${pkg.title}</h4>
          <p>⏰ সময়কালঃ ${pkg.validity} দিন </p>
          <p style="color:#d63031;"> ক্যাশব্যাকঃ ${pkg.cashback} টাকা </p>
          <div class="package-footer">
            <div class="price">${pkg.price}</div>
            <button class="buy-btn" onclick='showPopup(${JSON.stringify(pkg)})'>ক্রয় করুন</button>
          </div>
        `;
        packageArea.appendChild(card);
      });
    }


    function showPopup(pkg) {
      console.log("Popup open:", pkg); // ✅
      console.log("Current SIM:", currentSim); //
      currentPackage = pkg;
      document.getElementById("popup-offer-details").innerHTML = `
        <strong>${pkg.title}</strong><br>
        সময়কাল: ${pkg.validity} দিন <br>
        <span style="color:#d63031;"> ক্যাশব্যাক ${pkg.cashback} টাকা </span><br>
        মূল্য: ${pkg.price}
      `;
      document.getElementById("selected-sim-name").innerText = currentSim;
      document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popup").style.display = "none";
    }

    // for confirm purchase;
    function confirmPurchase() {
        console.log("Confirm Purchase Called");
        console.log("currentPackage =", currentPackage);
        console.log("currentSim =", currentSim);

        if (!currentPackage || !currentSim) {
            alert("ডাটা লোড হয়নি। দয়া করে আবার চেষ্টা করুন।");
            return;
        }

        const number = document.getElementById("user-number").value.trim();
        if (!number) {
            alert("দয়া করে মোবাইল নাম্বার লিখুন।");
            return;
        }

        // price থেকে ৳ বাদ দিয়ে number নেবো
        const price = parseInt(currentPackage.price.replace(/[^\d]/g, ''));
        // cashback থেকে শুধু number নেবো
        const cashback = Number(currentPackage.cashback);

        fetch('{{ route("driver-pack.purchase") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                sim_operator: currentSim,
                offer_title: currentPackage.title,
                validity: currentPackage.validity,
                price: price,
                cashback: cashback,
                phone_number: number
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else if(data.success) {
                alert(data.success);
                closePopup();
                // চাইলে এখানে UI আপডেট করেও দিতে পারো
            } else {
                alert("অজানা কোনো সমস্যা হয়েছে। দয়া করে আবার চেষ্টা করুন।");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("ক্রয় সম্পন্ন করা যায়নি। অনুগ্রহ করে আবার চেষ্টা করুন।");
        });
    }



    // function showHistory() {
    //   document.querySelector(".main-card").style.display = "none";
    //   document.querySelector(".sim-buttons").style.display = "none";
    //   document.getElementById("package-area").style.display = "none";
    //   // document.querySelector(".history-card").style.display = "none";
    //   document.getElementById("history-section").style.display = "block";
    // }


    function backToMain() {
      document.querySelector(".main-card").style.display = "block";
      document.querySelector(".sim-buttons").style.display = "grid";
      document.getElementById("package-area").style.display = currentSim ? "flex" : "none";
      document.querySelector(".history-card").style.display = "block";
      document.getElementById("history-section").style.display = "none";
    }

    document.querySelector(".history-card").addEventListener("click", showHistory);
  </script>


@endsection