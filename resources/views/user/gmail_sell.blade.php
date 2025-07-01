@extends('layout.gmail')

@section('title', 'Gmail Setting')

@section('content')
<div class="container my-1">

    {{-- হেডার সতর্কবার্তা --}}
    <div class="text-center p-7 mb-3" style="background: linear-gradient(to right, #c471f5, #fa71cd); border: 1px solid red; border-radius: 10px;">
        <p class="fw-semibold mb-2 text-dark">
            কেউ ফেক বা ভুল জিমেইল সাবমিট করবেন না<br>
         জিমেইলের কাজ শিখতে "JOIN" বাটনে ক্লিক করুন. ॥
        </p>
        <a href="https://t.me/longlifegmailsell" class="btn btn-primary px-4 fw-bold">Join</a>
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
            <div class="text-center mb-4" style="background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140)); color: white; border-radius: 6px; padding: 12px; position: relative;">

                <div style="margin-bottom: 10px; position: relative;">
                    আজকের পাসওয়ার্ড:
                    <strong id="todayPassword">{{ $setting->password }}</strong>
                    <button onclick="copyToClipboard('todayPassword')" 
                            style="background: none; border: none; position: absolute; right: 10px; top: 0;">
                        📋
                    </button>
                </div>

                <div style="position: relative;">
                    রিকোভারি জিমেইল:
                    <strong id="recoveryGmail">{{ $setting->recovery_gmail }}</strong>
                    <button onclick="copyToClipboard('recoveryGmail')" 
                            style="background: none; border: none; position: absolute; right: 10px; top: 0;">
                        📋
                    </button>
                </div>

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

                <button type="submit" style="background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));" class="btn btn-primary w-100 btn-lg fw-semibold">সাবমিট করুন</button>
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
    function copyToClipboard(elementId) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(function () {
            alert('কপি সফল হয়েছে!');
        }).catch(function () {
            alert('কপি করা যায়নি!');
        });
    }
</script>

@endsection