<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Resume App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: Arial; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2); width:380px; }
        .form-container h2 { text-align:center; margin-bottom:20px; color:#1e73be; }
        input { width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:5px; }
        button { width:100%; padding:10px; background:#1e73be; border:none; color:white; border-radius:5px; cursor:pointer; }
        button:hover { background:#155a96; }
        a { text-decoration:none; color:#1e73be; display:block; text-align:center; margin-top:10px; }
        .error { color:red; font-size:0.9em; margin-bottom:10px; }
        .success { color:green; font-size:0.9em; margin-bottom:10px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><i class="fas fa-user-plus"></i> Sign Up</h2>

        @if ($errors->any())
            <div class="error">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

            <button type="submit">Create Account</button>
        </form>

        <a href="/login"><i class="fas fa-sign-in-alt"></i> Already have an account? Login</a>
        <a href="/">Back to Welcome</a>
    </div>
</body>
</html>

