@extends('layout.user')

@section('content')
<div class="container my-4">
    {{-- Success/Error Message --}}
    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Balance Card --}}
    <div class="card shadow-sm mb-4 border-left-primary">
        <div class="card-body d-flex align-items-center">
            <i class="fas fa-wallet fa-2x text-success me-3"></i>
            <h5 class="mb-0 fw-bold text-dark">বর্তমান ব্যালেন্স: {{ number_format($balance, 2) }} টাকা</h5>
        </div>
    </div>

    {{-- Withdraw Form --}}
    <form action="{{ route('withdraw.submit') }}" method="POST" id="withdrawForm" class="needs-validation" novalidate>
        @csrf
        <div class="card shadow-sm">
            <div class="card-header bg-gradient bg-primary text-white text-center fw-bold">
                <i class="fas fa-money-check-alt me-2"></i> উইথড্র ফর্ম পূরণ করুন
            </div>
            <div class="card-body">

                {{-- Method --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">উইথড্র মেথড নির্বাচন করুন</label>
                    <select name="method" class="form-select" required>
                        <option value="">-- নির্বাচন করুন --</option>
                        @foreach($methods as $method)
                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Type --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">পেমেন্ট টাইপ নির্বাচন করুন</label>
                    <select name="type" class="form-select" required>
                        <option value="">-- নির্বাচন করুন --</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Number --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">প্রাপক নম্বর লিখুন</label>
                    <input type="text" name="number" class="form-control" placeholder="01XXXXXXXXX" required>
                </div>

                {{-- Amount --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        উইথড্র পরিমাণ ({{ $min }} - {{ $max }} টাকা)
                    </label>
                    <input type="number" name="amount" id="amountInput" class="form-control" placeholder="উইথড্র এমাউন্ট লিখুন" required>
                </div>

                {{-- Charges --}}
                <div class="mb-3 bg-light p-3 rounded">
                    <p class="mb-1 text-secondary">চার্জ: <strong><span id="chargeAmount">0</span></strong> টাকা</p>
                    <p class="mb-0 text-secondary">মোট কাটা হবে: <strong><span id="totalDeduct">0</span></strong> টাকা</p>
                </div>

                {{-- Submit --}}
                <div class="d-grid">
                    <button class="btn btn-success fw-bold shadow-sm">
                        <i class="fas fa-paper-plane me-1"></i> উইথড্র সাবমিট করুন
                    </button>
                </div>
            </div>

            <div class="card-footer bg-white text-center text-muted small">
                🔹 সর্বনিম্ন <strong>{{ $min }} টাকা</strong> এবং সর্বোচ্চ <strong>{{ $max }} টাকা</strong> উইথড্র করতে পারবেন।<br>
                🔸 উইথড্র চার্জ: <strong>{{ $charge }}%</strong><br>
                ⏳ প্রক্রিয়াকরণ সময়: ১-৫ কার্যদিবস
            </div>
        </div>
    </form>
</div>

{{-- Script to calculate charges --}}
<script>
document.getElementById('amountInput').addEventListener('input', function () {
    const amount = parseFloat(this.value) || 0;
    const chargePercent = {{ $charge }};
    const charge = (amount * chargePercent / 100).toFixed(2);
    const total = (amount + parseFloat(charge)).toFixed(2);

    document.getElementById('chargeAmount').textContent = charge;
    document.getElementById('totalDeduct').textContent = total;
});
</script>
@endsection
