@extends('layout.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4 text-yellow-600">🕐 Pending Withdraw Requests</h2>

    @include('admin.withdraw._table', ['withdraws' => $withdraws, 'type' => 'pending'])
</div>
@endsection
