@extends('layout.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4 text-green-600">✅ Approved Withdraw Requests</h2>

    @include('admin.withdraw._table', ['withdraws' => $withdraws, 'type' => 'approved'])
</div>
@endsection
