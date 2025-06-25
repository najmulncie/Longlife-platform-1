@extends('layout.public')

@section('title', 'Long Life ডিজিটাল বিজনেস প্ল্যাটফর্ম')


@section('content')


  <style>
   

    .card {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 14px;
      /* max-width: 850px; */
      margin: auto;
      transition: all 0.3s ease;
    }

    .card h1 {
      text-align: center;
      color: #1a237e;
      margin-bottom: 10px;
      font-weight: bold;
      font-size: 18px;
    }

    .card h2 {
      color: #d84315;
      text-align: center;
      margin-bottom: 25px;
    }

    .section {
      margin-bottom: 24px;
    }

    .section-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 12px;
      color: #1565c0;
      border-left: 5px solid #2196f3;
      padding-left: 10px;
    }

    .list {
      padding-left: 24px;
    }

    .list li {
      margin-bottom: 8px;
      color: #333;
      line-height: 1.6;
    }

    .bonus, .promise {
      background-color: #f1f8e9;
      padding: 14px 10px;
      border-radius: 12px;
    }

    .promise {
      background-color: #e3f2fd;
    }

    .join {
      text-align: center;
      margin-top: 30px;
    }

    .join p {
      font-size: 17px;
      margin-bottom: 16px;
      color: #2c3e50;
    }

    .join button {
      background-color: #388e3c;
      color: white;
      border: none;
      padding: 14px 28px;
      font-size: 16px;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      /* transition: background-color 0.3s ease; */
      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));

    }

    .join button:hover {
      /* background-color:rgb(9, 73, 116); */
      
    }

   .income {
    background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));
    /* color: white;*/
    padding: 14px 10px;
    border-radius: 12px;
    }


    .commission-list{
      background-color:rgb(227, 247, 253);
      padding: 14px 10px;
      border-radius: 12px;
    }
    
    hr{
      height: 4px;
      background-image: linear-gradient(to right,rgb(60, 70, 64), rgb(97, 183, 240));
    }
  </style>


  <div class="card">
    <h1 class="fs-5">🌟 Long Life ডিজিটাল বিজনেস প্ল্যাটফর্ম 🌟</h1>
    <h2>💥 মারাত্মক পরিকল্পনায় সাজানো এক অসাধারণ ইনকাম প্রজেক্ট! 💥</h2>
    
    <hr>

    <div class="section mt-5 income">
      <div class="section-title">🔔 ইনকাম সুযোগসমূহ:</div>
      <ul class="list">
        <li>1️⃣ মোবাইল রিচার্জ করে আয়</li>
        <li>2️⃣ ড্রাইভার অফার ও রিসেলিং প্রোডাক্ট সেল</li>
        <li>3️⃣ স্পিন করে ইনকাম</li>
        <li>4️⃣ মাইক্রো জব ও জব পোস্ট</li>
        <li>5️⃣ টাইপিং, কুইজ ও ভিডিও দেখে আয়</li>
        <li>6️⃣ সোশ্যাল মিডিয়া থেকে আয়</li>
        <li>7️⃣ স্লট আর্নিং থেকে ইনকাম</li>
        <li>8️⃣ নিজের প্রোডাক্ট ভেন্ডরশিপে সেল</li>
        <li>9️⃣ ডিজিটাল সার্ভিস ও প্রিমিয়াম প্যাকেজ</li>
        <li>🔟 জিমেইল, ইনস্টা, ফেসবুক, হোয়াটসঅ্যাপ সেল</li>
      </ul>
    </div>

    <div class="section commission-list">
      <div class="section-title">💸 রেফার কমিশন তালিকা:</div>
      <ul class="list">
        <li>১ম জেনারেশন – ৭০ টাকা</li>
        <li>২য় জেনারেশন – ৪০ টাকা</li>
        <li>৩য় জেনারেশন – ২০ টাকা</li>
        <li>৪র্থ জেনারেশন – ১০ টাকা</li>
        <li>৫ম জেনারেশন – ১০ টাকা</li>
        <li>৬ষ্ঠ জেনারেশন – ০৫ টাকা</li>
        <li>৭ম জেনারেশন – ০৪ টাকা</li>
        <li>৮ম জেনারেশন – ০৩ টাকা</li>
        <li>৯ম জেনারেশন – ০৩ টাকা</li>
        <li>১০ম জেনারেশন – ০৩ টাকা</li>
      </ul>
    </div>

    <div class="section bonus">
      <div class="section-title">🏆 বিশেষ বোনাস সুবিধা:</div>
      <ul class="list">
        <li>🎯 লিডারশিপ বোনাস</li>
        <li>🎯 গ্লোবাল বোনাস – ৬০০ টাকা (শর্ত সাপেক্ষে)</li>
        <li>🎯 দৈনিক টার্গেট বোনাস</li>
        <li>🎯 টার্গেট সেলারি – ৩০০০ টাকা</li>
        <li>🕋 ওমরাহ/হজ প্যাকেজ (শর্ত সাপেক্ষে)</li>
      </ul>
    </div>

    <div class="section promise">
      <div class="section-title">🚀 Long Life Family – আমাদের প্রতিশ্রুতি:</div>
      <ul class="list">
        <li>👉 আপনি সফল না হওয়া পর্যন্ত আমরা থামবো না!</li>
        <li>💚 স্মার্ট বাংলাদেশ গড়ার লক্ষ্যে এই প্ল্যাটফর্ম এক অনন্য মাইলফলক হবে ইনশাআল্লাহ।</li>
      </ul>
    </div>

    <div class="join">
      <p>📢 আজই যুক্ত হন – ভবিষ্যতের পথ তৈরি করুন!</p>
      <button>✅ ডিজিটাল জীবন, স্মার্ট ইনকাম – Long Life এর সাথেই হোক শুরু!</button>
    </div>
  </div>


@endsection