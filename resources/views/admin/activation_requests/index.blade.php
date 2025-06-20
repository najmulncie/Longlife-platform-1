@extends('layout.admin')

@section('content')
<style>
    /* মোবাইলের জন্য টেবিল স্ক্রল ও স্পেস ঠিক রাখতে */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* ছোট স্ক্রিনে হেডার নীল এবং ফন্ট একটু বড় */
    @media (max-width: 576px) {
        .card-header {
            background-color: #0d6efd !important; /* Bootstrap primary blue */
            font-size: 1.25rem;
            font-weight: 600;
        }

        table thead tr th, table tbody tr td {
            white-space: nowrap; /* টেক্সট ব্রেক এড়াতে */
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
    }
</style>

<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white py-3 px-4">
            <h4 class="mb-0">অ্যাক্টিভেশন রিকুয়েস্টস</h4>
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-striped table-hover w-100 mb-0 rounded-3">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" class="py-3 px-4">User</th>
                        <th scope="col" class="py-3 px-4">Method</th>
                        <th scope="col" class="py-3 px-4">Number</th>
                        <th scope="col" class="py-3 px-4">Transaction ID</th>
                        <th scope="col" class="py-3 px-4">Status</th>
                        <th scope="col" class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $req)
                    <tr>
                        <td class="align-middle px-4 py-3">{{ $req->user->name }}</td>
                        <td class="align-middle px-4 py-3 text-capitalize">{{ $req->method }}</td>
                        <td class="align-middle px-4 py-3">{{ $req->user_number }}</td>
                        <td class="align-middle px-4 py-3">{{ $req->transaction_id }}</td>
                        <td class="align-middle px-4 py-3">
                            @php
                                $statusColors = [
                                    'pending' => 'badge bg-warning text-dark',
                                    'approved' => 'badge bg-success',
                                    'rejected' => 'badge bg-danger'
                                ];
                            @endphp
                            <span class="{{ $statusColors[$req->status] ?? 'badge bg-secondary' }}">
                                {{ ucfirst($req->status) }}
                            </span>
                        </td>
                        <td class="align-middle px-4 py-3 text-center">
                            @if ($req->status === 'pending')
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <form method="POST" action="{{ route('admin.activation.approve', $req->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success px-3 mb-1">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.activation.reject', $req->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger px-3 mb-1">Reject</button>
                                    </form>
                                </div>
                            @else
                                <span class="text-muted">{{ ucfirst($req->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
