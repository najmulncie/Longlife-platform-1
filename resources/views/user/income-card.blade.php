@extends('layout.user')

@section('content')
<style>
    /* আপনার দেওয়া ডিজাইন 그대로 এখানে পেস্ট করলাম */
    .card-container {
        padding: 20px 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .income-card {
        background: linear-gradient(135deg, #7F00FF, #E100FF);
        color: #fff;
        border-radius: 16px;
        padding: 30px 25px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
        text-align: left;
        min-height: 180px;
    }

    .income-card::before {
        content: "\f06b";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 120px;
        color: rgba(255, 255, 255, 0.1);
        position: absolute;
        top: 10px;
        left: 15px;
        z-index: 1;
    }

    .income-card h5 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        z-index: 2;
        position: relative;
    }

    .amount-box {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.2);
        padding: 10px 25px;
        border-radius: 12px;
        font-size: 28px;
        font-weight: bold;
        color: #fff;
        z-index: 2;
    }

    .income-date {
        margin-top: 100px;
        font-size: 14px;
        opacity: 0.9;
        z-index: 2;
        position: relative;
    }

    .back-button {
        margin-top: 25px;
        background-color: #0d6efd;
        color: #fff;
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .back-button i {
        margin-right: 8px;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="card-container">
    <div class="income-card">
        <h5>{{ $label }}</h5>
        <div class="amount-box">৳ {{ number_format($income, 2) }}</div>
        <p class="income-date">Date: {{ $date }}</p>
    </div>

    <a href="{{ url()->previous() }}" class="back-button">
        <i class="fas fa-arrow-left"></i> পেছনে যান
    </a>
</div>
@endsection