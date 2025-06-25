@extends('layout.user')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
    <h2 class="text-3xl font-extrabold text-blue-800 mb-8 text-center">একাউন্ট একটিভ করুন</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.activate.submit') }}" enctype="multipart/form-data">
        @csrf

        {{-- পেমেন্ট মাধ্যম --}}
        <div class="mb-6">
            <label for="paymentMethod" class="block text-gray-700 font-semibold mb-2">পেমেন্ট মাধ্যম</label>
            <select name="method" id="paymentMethod" onchange="updateDetails()" class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                @foreach ($methods as $method)
                    <option value="{{ $method->method }}" {{ old('method') == $method->method ? 'selected' : '' }}>
                        {{ ucfirst($method->method) }}
                    </option>
                @endforeach
            </select>
            @error('method')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- পেমেন্ট ডিটেইলস --}}
        @foreach ($methods as $method)
            <div class="payment-info bg-gray-50 border border-gray-200 rounded-md p-4 mb-6 shadow-sm hidden" id="info_{{ $method->method }}">
                <div class="flex justify-between items-center mb-2">
                    <label class="font-semibold text-gray-700">{{ ucfirst($method->method) }} নাম্বার:</label>
                    <div class="flex items-center gap-3">
                        <span class="text-blue-700 font-mono text-lg">{{ $method->number }}</span>
                        <button type="button" onclick="copyToClipboard('{{ $method->number }}')" class="text-blue-600 hover:text-blue-800 focus:outline-none" aria-label="Copy Number">
                            📋
                        </button>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">{{ $method->description }}</p>
            </div>
        @endforeach

        {{-- ইউজারের নাম্বার --}}
        <div class="mb-6">
            <label for="user_number" class="block text-gray-700 font-semibold mb-2">আপনার নাম্বার (যেখান থেকে টাকা পাঠিয়েছেন) <span style="color: red">*</span></label>
            <input type="text" name="user_number" id="user_number" value="{{ old('user_number') }}" placeholder="আপনার নাম্বার লিখুন" required class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            @error('user_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- ট্রানজেকশন আইডি --}}
        <div class="mb-6">
            <label for="transaction_id" class="block text-gray-700 font-semibold mb-2">ট্রানজেকশন আইডি  <span style="color: red">*</span></label>
            <input type="text" name="transaction_id" id="transaction_id" value="{{ old('transaction_id') }}" placeholder="ট্রানজেকশন আইডি লিখুন" required class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            @error('transaction_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- স্ক্রিনশট আপলোড --}}
        <div class="mb-8">
            <label for="screenshot" class="block text-gray-700 font-semibold mb-2">পেমেন্টের স্ক্রিনশট (ঐচ্ছিক)</label>
            <input type="file" name="screenshot" id="screenshot" accept="image/*" class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            @error('screenshot')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        

        {{-- সাবমিট বাটন --}}
        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 rounded-md transition duration-300 ease-in-out">
            সাবমিট করুন
        </button>
    </form>
</div>

{{-- স্ক্রিপ্ট --}}
<script>
function updateDetails() {
    const selected = document.getElementById('paymentMethod').value;
    document.querySelectorAll('.payment-info').forEach(el => el.classList.add('hidden'));
    const activeDiv = document.getElementById('info_' + selected);
    if (activeDiv) activeDiv.classList.remove('hidden');
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('নাম্বার কপি হয়েছে!');
    });
}

document.addEventListener('DOMContentLoaded', updateDetails);
</script>
@endsection
