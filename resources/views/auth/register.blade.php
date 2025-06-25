@extends('layout.public')

@section('title', 'রেজিস্ট্রেশন করুন')


      <!-- background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140)); -->


@section('content')

<style>
    body {
        font-family: 'Noto Sans Bengali', sans-serif;
    }
</style>

<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center;background-color: rgb(247, 250, 248);">
  <div style="background: #fff; padding: 30px 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
    <h3 style="margin-bottom: 10px; text-align: center; color:rgb(62, 183, 204); font-size: 24px; font-weight: 700;">
      রেজিস্ট্রেশন করুন
    </h3>
    <p style="font-size: 14px; text-align: center; color: #666; margin-bottom: 25px;">
      একটি নতুন একাউন্ট তৈরি করতে নিচের তথ্যগুলো দিন
    </p>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div style="margin-bottom: 15px;">
        <label>পূর্ণ নাম <span style="color:red">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="আপনার নাম লিখুন"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        <span style="color: red">{{ $errors->has('name') ? $errors->first('name'): '' }}</span>
     
       </div>

      <div style="margin-bottom: 15px;">
        <label>Gmail ঠিকানা  <span style="color:red">*</span></label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="আপনার Gmail দিন"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        <span style="color: red">{{ $errors->has('email') ? $errors->first('email'): '' }}</span>
      
     </div>

      <div style="margin-bottom: 15px;">
        <label>মোবাইল নম্বর  <span style="color:red">*</span></label>
        <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="01XXXXXXXXX"
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
        <span style="color: red">{{ $errors->has('mobile') ? $errors->first('mobile'): '' }}</span>
      </div>

     <div style="margin-bottom: 15px; position: relative;">
        <label for="password">পাসওয়ার্ড <span style="color:red">*</span></label>

        <input type="password" name="password" id="password" placeholder="********"
            style="width: 100%; padding: 10px 40px 10px 10px; border: 1px solid #ccc; border-radius: 6px;">

        {{-- চোখের আইকন --}}
        <span onclick="togglePassword()" style="position: absolute; top: 38px; right: 10px; cursor: pointer;">
            👁️
        </span>

        <span style="color: red">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
     </div>


      <div style="margin-bottom: 15px;">
        <label>পাসওয়ার্ড নিশ্চিত করুন <span style="color:red">*</span></label>
        <input type="password" name="password_confirmation" placeholder="পুনরায় পাসওয়ার্ড লিখুন"
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
              style="width: 100%;      background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));
      color: #fff; padding: 10px 0; border: none; border-radius: 6px; font-weight: 600; font-size: 16px;">
        রেজিস্ট্রেশন করুন
      </button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px;">
      আগে থেকেই একাউন্ট আছে?
      <a href="{{ route('login') }}" style="color:rgb(104, 41, 230); font-weight: 600;">লগইন করুন</a>
    </p>
  </div>
</div>


<script>
    function togglePassword() {
        const input = document.getElementById("password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>



@endsection
