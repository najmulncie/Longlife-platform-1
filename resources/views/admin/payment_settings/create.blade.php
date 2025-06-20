@extends('layout.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header" style="background-color: #1F2937; padding: 20px 24px;">
            <h4 class="text-white mb-0">নতুন পেমেন্ট সেটিং</h4>
        </div>

        <div class="card-body px-4 py-3">
            <form method="POST" action="{{ route('payment-settings.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">পেমেন্ট মেথড (যেমন: bKash, Nagad)</label>
                    <input type="text" name="method" required
                           class="form-control shadow-sm" placeholder="যেমনঃ bkash, nagad">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">পেমেন্ট নাম্বার</label>
                    <input type="text" name="number" required
                           class="form-control shadow-sm" placeholder="যেমনঃ 01XXXXXXXXX">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">বিস্তারিত (ঐচ্ছিক)</label>
                    <textarea name="description" class="form-control shadow-sm" rows="4"
                              placeholder="মেথড সংক্রান্ত যেকোনো বিস্তারিত তথ্য দিন"></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn text-white px-4 py-2"
                            style="background-color: #10B981; border-radius: 6px;">
                        সংরক্ষণ করুন
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
