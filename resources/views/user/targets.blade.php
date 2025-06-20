@extends('layout.user') {{-- আপনার ইউজার লেআউট এখানে বসান --}}


<!-- @if(session('success'))
    <div id="popupMessage" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50 animate__animated animate__fadeInDown">
        {{ session('success') }}
    </div>

    <script>
        // 3 সেকেন্ড পর popup hide হবে
        setTimeout(function() {
            var popup = document.getElementById('popupMessage');
            if (popup) {
                popup.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
@endif -->

@if(session('success'))
    <div id="popupMessage" class="custom-popup">
        {{ session('success') }}
    </div>

    <style>
        .custom-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideDown 0.5s ease, fadeOut 1s ease 2.5s forwards;
        }

        @keyframes slideDown {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeOut {
            to { opacity: 0; transform: translateY(-10px); }
        }
    </style>

    <script>
        setTimeout(function () {
            var popup = document.getElementById('popupMessage');
            if (popup) {
                popup.remove();
            }
        }, 3500); // Total 3.5 seconds
    </script>
@endif

@section('content')
<div class="container">
    <h2>আপনার টার্গেট সমূহ</h2>

    @foreach($targets as $target)
        <div class="card my-3">
            <div class="card-body">
                <h4>{{ ucfirst($target['type']) }} টার্গেট পূরণ করুন {{ $target['reward'] }} টাকা জিতুন</h4>
                <p>রেফার হয়েছে: {{ $target['achieved'] }} / {{ $target['required'] }}</p>

                <div class="progress mb-2" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" style="width: {{ $target['progress'] }}%;">
                        {{ number_format($target['progress'], 1) }}%
                    </div>
                </div>

                @if($target['time_left'])
                    <p>সময় বাকি: {{ gmdate("H:i:s", $target['time_left']) }}</p>
                @endif

                @if($target['can_claim'])
                    <form action="{{ route('user.claimTarget', $target['type']) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">বোনাস ক্লেইম করুন</button>
                    </form>
                @else
                    <button class="btn btn-secondary" disabled>টার্গেট পূরণ করুন</button>
                @endif

            </div>
        </div>
    @endforeach

</div>
@endsection
