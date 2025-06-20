@extends('layout.admin') {{-- আপনার অ্যাডমিন লেআউট ফাইল যদি অন্য কিছু হয়, সেটা দিন --}}

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-4">Fixed Commission Settings (10 Generation)</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.fixedCommissions.update') }}">
        @csrf
        @for ($i = 1; $i <= 10; $i++)
            <div class="mb-4">
                <label class="block font-semibold mb-1">Generation {{ $i }} Commission (৳)</label>
                <input type="number" name="amounts[{{ $i }}]" step="0.01"
                    value="{{ $commissions->firstWhere('generation', $i)->amount ?? 0 }}"
                    class="w-full border rounded p-2">
            </div>
        @endfor

        <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Save Settings
        </button>
    </form>
</div>
@endsection
