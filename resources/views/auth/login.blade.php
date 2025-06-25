@extends('layout.public')

@section('content')

<style>
    body {
        font-family: 'Noto Sans Bengali', sans-serif;
    }
</style>

<div class="fixed inset-0 flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white shadow-xl rounded-xl w-full max-w-md sm:max-w-lg p-6 sm:p-8">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-indigo-700" style="color:rgb(62, 183, 204); ">লগইন করুন</h2>
            <p class="text-gray-500 mt-1 text-base">আপনার অ্যাকাউন্টে প্রবেশ করুন</p>
        </div>

        @if($errors->has('account_suspended'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ $errors->first('account_suspended') }}
            </div>
        @endif

        <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ইমেইল বা মোবাইল</label>
                <input type="text" name="login"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                       placeholder="ইমেইল / মোবাইল">
                <span class="text-red-500 text-sm">{{ $errors->first('login') }}</span>
                <span id="errorLogin" class="text-red-500 text-sm"></span>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">পাসওয়ার্ড</label>
                <div class="relative">
                    <input type="password" name="password" id="password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                           placeholder="********">
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 cursor-pointer"
                         onclick="togglePasswordVisibility(this)">
                        👁️
                    </div>
                </div>
                <span id="errorPassword" class="text-red-500 text-sm"></span>
            </div>

            <div class="flex justify-between items-center text-sm text-gray-600">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2"> মনে রাখুন
                </label>
                <a href="#" class="text-indigo-600 hover:underline">পাসওয়ার্ড ভুলে গেছেন?</a>
            </div>

            <button type="submit"
                  style="background-image: linear-gradient(to right,rgb(139, 202, 245),rgb(130, 151, 140));"  class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg text-base font-semibold transition ">
                লগইন করুন
            </button>
        </form>

        <p class="text-center text-sm text-gray-700 mt-6">
            অ্যাকাউন্ট নেই?
            <a href="/register" class="text-indigo-600 hover:underline font-medium">নতুন অ্যাকাউন্ট তৈরি করুন</a>
        </p>
    </div>
</div>

<script>
    function togglePasswordVisibility(icon) {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const login = document.getElementsByName('login')[0].value.trim();
        const password = document.getElementsByName('password')[0].value.trim();
        const errorLogin = document.getElementById('errorLogin');
        const errorPassword = document.getElementById('errorPassword');
        let isValid = true;

        errorLogin.textContent = '';
        errorPassword.textContent = '';

        if (login === '') {
            errorLogin.textContent = 'ইমেইল / মোবাইল দিতে হবে';
            isValid = false;
        }

        if (password === '') {
            errorPassword.textContent = 'পাসওয়ার্ড দিতে হবে';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
@endsection