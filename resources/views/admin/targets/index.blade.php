@extends('layout.admin')

@section('content')
    <h2 class="text-xl font-bold mb-4">🎯 টার্গেট বোনাস নিয়ন্ত্রণ</h2>

    @foreach($targets as $target)
        <form action="{{ route('admin.targets.update', $target->id) }}" method="POST" class="mb-4 p-4 bg-white rounded shadow">
            @csrf
            @method('PUT')

            <h3 class="capitalize font-semibold">{{ $target->type }} Target</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block">Required Active Refs</label>
                    <input type="number" name="required_active_refs" value="{{ $target->required_active_refs }}" class="w-full border px-2 py-1 rounded">
                </div>

                <div>
                    <label class="block">Reward Amount (BDT)</label>
                    <input type="number" name="reward_amount" value="{{ $target->reward_amount }}" class="w-full border px-2 py-1 rounded">
                </div>

                <div class="flex items-center mt-6">
                    <input type="checkbox" name="is_active" {{ $target->is_active ? 'checked' : '' }} class="mr-2">
                    <span>Active</span>
                </div>
            </div>

            <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    @endforeach
@endsection
