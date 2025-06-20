@extends('layout.user') {{-- আপনার ইউজার লেআউট এখানে বসান --}}

@section('content')
<div class="container py-4">
    <h2 class="mb-4">🔐 পাসওয়ার্ড পরিবর্তন করুন</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.change.password.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="current_password" class="form-label">পুরাতন পাসওয়ার্ড</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">নতুন পাসওয়ার্ড</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">নতুন পাসওয়ার্ড নিশ্চিত করুন</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">পাসওয়ার্ড পরিবর্তন করুন</button>
    </form>
</div>
@endsection
