<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2); width:350px; }
        h2 { text-align:center; color:#1e73be; }
        input, button { width:100%; padding:10px; margin:10px 0; border-radius:5px; }
        button { background:#2ecc71; color:white; border:none; cursor:pointer; }
        button:hover { background:#27ae60; }
        .error { color:red; }
        a { text-decoration:none; display:block; text-align:center; margin-top:10px; color:#1e73be; }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Reset Password</h2>
    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
        <button type="submit">Reset Password</button>
    </form>
    <a href="/login">Back to Login</a>
</div>
</body>
</html>
