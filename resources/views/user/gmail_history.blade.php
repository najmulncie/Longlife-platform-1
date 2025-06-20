@extends('layout.user')

@section('content')
<div class="container mt-4">
    <h4>আপনার বিক্রিত Gmail</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Gmail</th>
                <th>Status</th>
                <th>তারিখ</th>
            </tr>
        </thead>
        <tbody>
            @foreach(auth()->user()->gmailSales as $sale)
            <tr>
                <td>{{ $sale->gmail }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $sale->status == 'pending' ? 'warning' :
                        ($sale->status == 'checked' ? 'info' :
                        ($sale->status == 'rejected' ? 'danger' : 'success'))
                    }}">
                        {{ ucfirst($sale->status) }}
                    </span>
                </td>
                <td>{{ $sale->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
