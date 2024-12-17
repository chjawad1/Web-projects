<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include the CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="card">
        <h2 class="title">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email Field -->
            <div class="field">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.94 4.56a1.5 1.5 0 00-1.44.7C1.1 6.06 1 7.03 1 8v4c0 .97.1 1.94.5 2.74a1.5 1.5 0 001.44.7h12.12c.61 0 1.18-.3 1.44-.7.4-.8.5-1.77.5-2.74V8c0-.97-.1-1.94-.5-2.74a1.5 1.5 0 00-1.44-.7H2.94zM4 7.5a.5.5 0 01.5-.5h11a.5.5 0 01.5.5V8l-6 3.5L4 8v-.5zm.5 5a.5.5 0 01.5-.5h9a.5.5 0 01.5.5v.5h-10v-.5z" />
                </svg>
                <input type="email" class="input-field" name="email" placeholder="Email" required>
            </div>
            <!-- Password Field -->
            <div class="field">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 4a2 2 0 00-2 2v2H6a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2v-6a2 2 0 00-2-2h-2V6a2 2 0 00-2-2zM8 8V6a2 2 0 114 0v2H8z" />
                </svg>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn">Login</button>
            <!-- Forgot Password Link -->
            <a href="#" class="btn-link">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
