@extends('layout.admin')

@section('content')
<div class="container my-4">
    <h2 class="mb-4 text-primary fw-bold">Commission Settings</h2>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        {{ session('success') }}
    </div>
@endif


    <form method="POST" action="{{ route('admin.commissions.update') }}">
        @csrf

        <div class="row g-3">
            @for ($i = 1; $i <= 10; $i++)
                <div class="col-md-6">
                    <label for="level-{{ $i }}" class="form-label">Level {{ $i }} Commission (%)</label>
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        max="100"
                        id="level-{{ $i }}"
                        name="percentages[{{ $i }}]"
                        value="{{ old('percentages.'.$i, $settings->firstWhere('level', $i)->percentage ?? 0) }}"
                        class="form-control @error('percentages.'.$i) is-invalid @enderror"
                        placeholder="Enter commission for level {{ $i }}"
                    >
                    @error('percentages.'.$i)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endfor
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success px-4">Update Commissions</button>
        </div>
    </form>
</div>
@endsection
