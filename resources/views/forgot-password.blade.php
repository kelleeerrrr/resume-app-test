<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2); width:350px; }
        h2 { text-align:center; color:#1e73be; }
        input, button { width:100%; padding:10px; margin:10px 0; border-radius:5px; }
        button { background:#2ecc71; color:white; border:none; cursor:pointer; }
        button:hover { background:#27ae60; }
        .success { color:green; }
        .error { color:red; }
        a { text-decoration:none; display:block; text-align:center; margin-top:10px; color:#1e73be; }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Forgot Password</h2>
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>
    <a href="/login">Back to Login</a>
</div>
</body>
</html>
