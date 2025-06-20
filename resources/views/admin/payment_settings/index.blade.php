@extends('layout.admin')

@section('content')
<div class="container mt-3">
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-header d-flex justify-content-between align-items-center"
             style="background-color: #1F2937; padding: 20px 24px; border-bottom: 1px solid #e5e7eb;">
            <h4 class="mb-0 text-white fw-bold" style="font-size: 20px;">পেমেন্ট সেটিংস</h4>

            <a href="{{ route('payment-settings.create') }}" 
               class="btn btn-sm text-white shadow-sm"
               style="background-color: #3B82F6; padding: 8px 18px; border-radius: 6px;">
                নতুন যোগ করুন
            </a>
        </div>

        <div class="card-body px-3 pt-2 pb-0">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center mb-0" style="font-size: 14.5px;">
                    <thead class="table-light">
                        <tr class="text-secondary">
                            <th class="py-2">মেথড</th>
                            <th class="py-2">নাম্বার</th>
                            <th class="py-2">ডিসক্রিপশন</th>
                            <th class="py-2">একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($settings as $setting)
                        <tr>
                            <td class="py-2">{{ ucfirst($setting->method) }}</td>
                            <td class="py-2">{{ $setting->number }}</td>
                            <td class="py-2">{{ $setting->description }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="{{ route('payment-settings.edit', $setting->id) }}"
                                       class="btn btn-sm btn-outline-primary px-3 py-1 shadow-sm"
                                       style="min-width: 80px;">
                                        Edit
                                    </a>
                                    <form action="{{ route('payment-settings.destroy', $setting->id) }}" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিতভাবে ডিলিট করতে চান?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger px-3 py-1 shadow-sm"
                                                style="min-width: 80px;">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-muted py-4 text-center">
                                কোনো পেমেন্ট সেটিংস পাওয়া যায়নি।
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
