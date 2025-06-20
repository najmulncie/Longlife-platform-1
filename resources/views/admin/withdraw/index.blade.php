@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <h4>সকল উইথড্র রিকোয়েস্ট</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ইউজার</th>
                <th>মেথড</th>
                <th>টাইপ</th>
                <th>নাম্বার</th>
                <th>অ্যামাউন্ট</th>
                <th>চার্জ</th>
                <th>মোট</th>
                <th>স্ট্যাটাস</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdraws as $w)
                <tr>
                    <td>{{ $w->user->name }} (ID: {{ $w->user_id }})</td>
                    <td>{{ $w->method->name }}</td>
                    <td>{{ $w->type->name }}</td>
                    <td>{{ $w->number }}</td>
                    <td>{{ $w->amount }}৳</td>
                    <td>{{ $w->charge }}৳</td>
                    <td>{{ $w->total }}৳</td>
                    <td>
                        @if($w->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($w->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                    <td>
                        @if($w->status == 'pending')
                        <form action="{{ route('admin.withdraw.approve', $w->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-success" onclick="return confirm('Approve করবেন?')">Approve</button>
                        </form>

                        <form action="{{ route('admin.withdraw.reject', $w->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Reject করলে ব্যালেন্স ফেরত যাবে। কনফার্ম?')">Reject</button>
                        </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
