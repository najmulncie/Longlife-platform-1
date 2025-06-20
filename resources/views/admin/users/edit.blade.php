@extends('layout.admin')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">ইউজার আপডেট করুন</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium text-gray-700">নাম</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-medium text-gray-700">ইমেইল</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block mb-1 font-medium text-gray-700">মোবাইল</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->mobile) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="balance" class="block mb-1 font-medium text-gray-700">ব্যালেন্স</label>
            <input type="number" id="balance" step="0.01" name="balance" value="{{ old('balance', $user->balance) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('balance')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-1 font-medium text-gray-700">পাসওয়ার্ড (পরিবর্তন করতে চাইলে)</label>
            <input type="password" id="password" name="password" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ছেড়ে দিন যদি পরিবর্তন না করতে চান">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="is_active" class="block mb-1 font-medium text-gray-700">স্ট্যাটাস</label>
            <select id="is_active" name="is_active" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('is_active')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- অন্য input গুলোর নিচে বসান --}}
<p class="mt-4 font-semibold">অ্যাডমিন মেসেজ:</p>
<textarea name="admin_message" rows="3" class="w-full p-2 border rounded">{{ $user->admin_message }}</textarea>

        <button type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded hover:bg-blue-700 transition">
            Update
        </button>
    </form>
</div>
@endsection
