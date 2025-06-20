@extends('layout.user')  {{-- তোমার ইউজার লেআউট ফাইল যেমন app.blade.php বা অন্য যেটা ইউজ করো --}}

@section('content')
<div class="container">

    <h2>My Gmail Sales History</h2>

    <!-- Status filter buttons -->
    <div class="btn-group mb-4" role="group" aria-label="Status Filter">
        @php
            $statuses = ['pending' => 'Pending', 'checked' => 'Checked', 'rejected' => 'Rejected', 'completed' => 'Completed'];
        @endphp

        @foreach ($statuses as $key => $label)
            <a href="{{ route('user.gmail-sales.history', $key) }}" 
               class="btn btn-sm {{ $status == $key ? 'btn-primary' : 'btn-outline-primary' }}">
               {{ $label }}
            </a>
        @endforeach
    </div>

    @if($gmailSales->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gmail Address</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gmailSales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->gmail }}</td>
                        <td>{{ ucfirst($sale->status) }}</td>
                        <td>{{ $sale->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No Gmail sales found for <strong>{{ ucfirst($status) }}</strong> status.</p>
    @endif

</div>
@endsection
