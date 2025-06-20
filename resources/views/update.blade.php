@extends('layout.user')

@section('content')
<style>
    .update-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px 20px;
        min-height: 80vh;
        background: linear-gradient(to right, #e3f2fd, #fce4ec);
        text-align: center;
    }

    .update-card {
        background: #ffffff;
        max-width: 600px;
        width: 100%;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .update-card img {
        width: 100px;
        height: 100px;
        margin-bottom: 20px;
        display: block;
    }

    .update-card h2 {
        font-size: 26px;
        margin-bottom: 15px;
        color: #2e7d32;
    }

    .update-card p {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .update-card .thanks {
        font-weight: bold;
        font-size: 16px;
        color: #d32f2f;
    }

    @media (max-width: 600px) {
        .update-card {
            padding: 20px;
        }

        .update-card h2 {
            font-size: 22px;
        }

        .update-card p, .update-card .thanks {
            font-size: 15px;
        }

        .update-card img {
            width: 80px;
            height: 80px;
        }
    }
</style>

<div class="update-wrapper">
    <div class="update-card">
        <img src="https://cdn-icons-png.flaticon.com/512/1055/1055646.png" alt="Update Icon">
        <h2>⚙️ আপডেটের কাজ চলছে!</h2>
        <p>
            আমরা সাইটের উন্নতির জন্য কিছু গুরুত্বপূর্ণ আপডেট করছি।<br>
            অনুগ্রহ করে আমাদের সাথে থাকুন ও অপেক্ষা করুন। ❤️
        </p>
        <div class="thanks">
            আপনার ধৈর্যের জন্য অসংখ্য ধন্যবাদ! 🚀
        </div>
    </div>
</div>
@endsection
