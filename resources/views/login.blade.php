<!DOCTYPE html>
<html>
<head>
    <title>Login - Resume App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: Arial; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2); width:350px; }
        .form-container h2 { text-align:center; margin-bottom:20px; color:#1e73be; }
        input { width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:5px; }
        button { width:100%; padding:10px; background:#2ecc71; border:none; color:white; border-radius:5px; cursor:pointer; }
        button:hover { background:#27ae60; }
        a { text-decoration:none; color:#1e73be; display:block; text-align:center; margin-top:10px; }
        .error { color:red; font-size:0.9em; margin-bottom:10px; }
        .success { color:green; font-size:0.9em; margin-bottom:10px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><i class="fas fa-sign-in-alt"></i> Login</h2>

        @if ($errors->any())
            <div class="error">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="text" name="login" placeholder="Username or Email" required
                   oninvalid="this.setCustomValidity('All fields are required!')"
                   oninput="this.setCustomValidity('')">
            <input type="password" name="password" placeholder="Password" required
                   oninvalid="this.setCustomValidity('All fields are required!')"
                   oninput="this.setCustomValidity('')">
            <button type="submit">Login</button>
        </form>

        <a href="/forgot-password"><i class="fas fa-key"></i> Forgot your password?</a>
        <a href="/signup"><i class="fas fa-user-plus"></i> Create new account</a>
        <a href="/">Back to Welcome</a>
    </div>
</body>
</html>

