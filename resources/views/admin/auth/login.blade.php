<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - LongLife Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styling -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: bold;
            color: #333;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        .login-box input:focus {
            border-color: #667eea;
            outline: none;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: #667eea;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-box button:hover {
            background-color: #5a67d8;
        }

        .error {
            background: #ffe5e5;
            color: #cc0000;
            padding: 10px;
            border: 1px solid #ffcccc;
            border-radius: 6px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .login-logo {
            width: 70px;
            margin-bottom: 10px;
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-box">
        {{-- Optional Logo --}}
        {{-- <img src="{{ asset('logo.png') }}" alt="Logo" class="login-logo"> --}}

        <h2>Admin Panel Login</h2>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <input type="email" name="email" placeholder="Admin Email" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
