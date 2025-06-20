@extends('layout.admin')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📧 Gmail বিক্রি সেটিংস</h4>
            <button id="toggleProject" class="btn btn-warning btn-sm">Toggle ON/OFF</button>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.gmail.setting.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">🔐 Gmail Password:</label>
                    <input type="text" name="password" value="{{ $setting->password ?? '' }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">📅 Daily Limit:</label>
                    <input type="number" name="limit" value="{{ $setting->limit ?? 0 }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">💰 Per Gmail Price (৳):</label>
                    <input type="number" step="0.01" name="price" value="{{ $setting->price ?? 0 }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">📌 Status:</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ ($setting->status ?? false) ? 'selected' : '' }}>ON</option>
                        <option value="0" {{ !($setting->status ?? true) ? 'selected' : '' }}>OFF</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">✅ আপডেট করুন</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional: AJAX toggle -->
<script>
document.getElementById('toggleProject').addEventListener('click', function () {
    fetch("{{ route('admin.gmail.setting.toggle') }}")
        .then(res => res.json())
        .then(data => alert('📢 Project is now ' + (data.status ? 'ON' : 'OFF')));
});
</script>
@endsection
