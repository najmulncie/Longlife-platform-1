@extends('layout.public')

@section('title', 'রেজিস্ট্রেশন করুন')

@section('content')
<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center; background: #f0f2f5;">
  <div style="background: #fff; padding: 30px 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
    <h3 style="margin-bottom: 10px; text-align: center; color: #4a00e0; font-size: 24px; font-weight: 700;">
      রেজিস্ট্রেশন করুন
    </h3>
    <p style="font-size: 14px; text-align: center; color: #666; margin-bottom: 25px;">
      একটি নতুন একাউন্ট তৈরি করতে নিচের তথ্যগুলো দিন
    </p>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div style="margin-bottom: 15px;">
        <label>পূর্ণ নাম</label>
        <input type="text" name="name" value="{{ old('name') }}" required placeholder="আপনার নাম লিখুন"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label>Gmail ঠিকানা</label>
        <input type="email" name="email" value="{{ old('email') }}" required placeholder="আপনার Gmail দিন"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label>মোবাইল নম্বর</label>
        <input type="text" name="mobile" value="{{ old('mobile') }}" required placeholder="01XXXXXXXXX"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label>পাসওয়ার্ড</label>
        <input type="password" name="password" required placeholder="********"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
      </div>

      <div style="margin-bottom: 15px;">
        <label>পাসওয়ার্ড নিশ্চিত করুন</label>
        <input type="password" name="password_confirmation" required placeholder="পুনরায় পাসওয়ার্ড লিখুন"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
      </div>

      <div style="margin-bottom: 15px;">
    <label>অ্যাফিলিয়েট আইডি (ঐচ্ছিক)</label>
    <input type="text" name="referral_code" placeholder="Referral Code (optional)"
           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
</div>


      <div style="margin-bottom: 20px;">
        <label style="font-size: 14px;">
          <input type="checkbox" required style="margin-right: 5px;"> আমি <a href="#" style="color: #007bff;">প্রাইভেসি পলিসি</a> মেনে নিয়েছি
        </label>
      </div>

      <button type="submit"
              style="width: 100%; background-color: #4a00e0; color: #fff; padding: 10px 0; border: none; border-radius: 6px; font-weight: 600; font-size: 16px;">
        রেজিস্ট্রেশন করুন
      </button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px;">
      আগে থেকেই একাউন্ট আছে?
      <a href="{{ route('login') }}" style="color: #4a00e0; font-weight: 600;">লগইন করুন</a>
    </p>
  </div>
</div>
@endsection
