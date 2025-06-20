@extends('layout.gmail')

@section('content')
<div class="container my-1">

    {{-- হেডার সতর্কবার্তা --}}
    <div class="text-center p-7 mb-3" style="background: linear-gradient(to right, #c471f5, #fa71cd); border: 1px solid red; border-radius: 10px;">
        <p class="fw-semibold mb-2 text-dark">
            কেউ ফেক বা ভুল জিমেইল সাবমিট করবেন না<br>
         জিমেইলের কাজ শিখতে "JOIN" বাটনে ক্লিক করুন. ॥
        </p>
        <a href="https://t.me/gmail_training" class="btn btn-primary px-4 fw-bold">Join</a>
    </div>

    @if(isset($setting) && $setting->status)
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 480px;">
            <h1 class="mb-4 text-center fw-bold">জিমেইল বিক্রি করুন</h1>

            {{-- Admin সেটিংস তথ্য --}}
            <div class="mb-4 bg-light p-3 rounded">
                <p class="mb-2"><strong>আজকের লিমিট:</strong> {{ $setting->limit }} টি</p>
                <p class="mb-2"><strong>প্রতি জিমেইলের দাম:</strong> ৳ {{ number_format($setting->price, 2) }}</p>
            </div>

            {{-- আজকের পাসওয়ার্ড (নীল বক্সের ভিতরে) --}}
            <div class="text-center mb-4" style="background-color: #0057FF; color: white; border-radius: 6px; padding: 12px; position: relative;">
                আজকের পাসওয়ার্ড:
                <strong id="todayPassword">{{ '' . $setting->password }}</strong>
                <!--<button onclick="copyPassword()" style="background: none; border: none; position: absolute; right: 10px; top: 10px;">-->
                <!--    <img src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png" alt="Copy" width="20" />-->
                <!--</button>-->
                
                <!-- Font Awesome যুক্ত থাকলে এই বাটন ব্যবহার করুন -->
<button onclick="copyPassword()" style="background: none; border: none; position: absolute; right: 10px; top: 10px;">
    <i class="fas fa-copy" style="font-size: 20px;"></i>
</button>

            </div>

            <form method="POST" action="{{ route('user.gmail.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="gmail" class="form-label">জিমেইল লিখুন</label>
                    <input type="email" name="gmail" id="gmail" class="form-control form-control-lg" required placeholder="আপনার Gmail লিখুন">
                </div>

                <div class="mb-4">
                    <label for="gmail_password" class="form-label">পাসওয়ার্ড লিখুন</label>
                    <input type="text" name="gmail_password" id="gmail_password" class="form-control form-control-lg" required placeholder="Gmail পাসওয়ার্ড লিখুন">
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg fw-semibold">সাবমিট করুন</button>
            </form>
        </div>
    @else
        <div class="alert alert-warning text-center mx-auto" style="max-width: 480px;">
            <strong>দুঃখিত!</strong> বর্তমানে Gmail বিক্রির প্রজেক্টটি বন্ধ রয়েছে। অনুগ্রহ করে পরে চেষ্টা করুন।
        </div>

        <div class="card shadow-sm p-4 mx-auto" style="max-width: 480px;">
            <div class="mb-3">
                <input type="email" class="form-control form-control-lg" disabled placeholder="Gmail বিক্রি বর্তমানে বন্ধ">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control form-control-lg" disabled placeholder="Gmail বিক্রি বর্তমানে বন্ধ">
            </div>
            <button class="btn btn-secondary w-100 btn-lg" disabled>Gmail বিক্রি করুন</button>
        </div>
    @endif

   

{{-- কপি করার জন্য JS --}}
<script>
    function copyPassword() {
        const password = document.getElementById('todayPassword').innerText;
        navigator.clipboard.writeText(password).then(function () {
            alert('Password copied!');
        });
    }
</script>
@endsection