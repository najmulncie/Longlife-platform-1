@extends('layout.user')

@section('content')
<div class="container my-4">
    <h4 class="fw-bold mb-4"><i class="fas fa-history me-2"></i>উইথড্র ইতিহাস</h4>

    {{-- Status Tabs --}}
    <ul class="nav nav-pills mb-3 justify-content-center" id="withdraw-tabs">
        @php
            $tabs = ['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'];
        @endphp
        @foreach($tabs as $key => $label)
            <li class="nav-item">
                <a class="nav-link {{ $status === $key ? 'active' : '' }}" 
                   href="{{ route('withdraw.history', ['status' => $key]) }}">
                    {{ strtoupper($label) }}
                </a>
            </li>
        @endforeach
    </ul>

    {{-- Withdraw Table --}}
    @if($withdraws->isEmpty())
        <div class="alert alert-warning text-center">এই ক্যাটাগরিতে কোনো উইথড্র রিকোয়েস্ট পাওয়া যায়নি।</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="table-light text-center">
                    <tr>
                        <th>তারিখ</th>
                        <th>মেথড</th>
                        <th>টাইপ</th>
                        <th>নাম্বার</th>
                        <th>পরিমাণ</th>
                        <th>স্ট্যাটাস</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($withdraws as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d M, Y h:i A') }}</td>
                            <td>{{ $item->method->name ?? 'N/A' }}</td>
                            <td>{{ $item->type->name ?? 'N/A' }}</td>
                            <td>{{ $item->number }}</td>
                    
                            <td>{{ number_format($item->amount, 2) }} টাকা</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($item->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($item->status == 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
