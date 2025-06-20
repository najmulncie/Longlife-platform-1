@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <h4>Withdraw Configuration</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Withdraw Method --}}
    <form action="{{ route('admin.withdraw.method.store') }}" method="POST" class="mb-4">
        @csrf
        <h5>Add Withdraw Method</h5>
        <input type="text" name="name" class="form-control mb-2" placeholder="e.g., bKash, Nagad" required>
        <button type="submit" class="btn btn-primary">Add Method</button>
    </form>

    {{-- Withdraw Type --}}
    <form action="{{ route('admin.withdraw.type.store') }}" method="POST" class="mb-4">
        @csrf
        <h5>Add Withdraw Type</h5>
        <input type="text" name="name" class="form-control mb-2" placeholder="e.g., Personal, Agent" required>
        <button type="submit" class="btn btn-primary">Add Type</button>
    </form>

    {{-- Withdraw Config --}}
    <form action="{{ route('admin.withdraw.config.store') }}" method="POST">
        @csrf
        <h5>Withdraw Settings</h5>
        <div class="form-group">
            <label>Minimum Amount</label>
            <input type="number" name="min" value="{{ $min }}" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Maximum Amount</label>
            <input type="number" name="max" value="{{ $max }}" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label>Charge (%)</label>
            <input type="number" name="charge" value="{{ $charge }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save Configuration</button>
    </form>

    {{-- Existing Methods --}}
    <div class="mt-5">
        <h5>Current Methods</h5>
        <ul>
            @foreach($methods as $m)
                <li>{{ $m->name }}</li>
            @endforeach
        </ul>
    </div>

    {{-- Existing Types --}}
    <div class="mt-3">
        <h5>Current Types</h5>
        <ul>
            @foreach($types as $t)
                <li>{{ $t->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
