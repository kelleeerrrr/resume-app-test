<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; display:flex; justify-content:center; align-items:center; height:100vh; }
        .form-container { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2); width:350px; position:relative; }
        h2 { text-align:center; color:#1e73be; }
        input, button { width:100%; padding:10px; margin:10px 0; border-radius:5px; }
        button { background:#2ecc71; color:white; border:none; cursor:pointer; }
        button:hover { background:#27ae60; }
        a { text-decoration:none; display:block; text-align:center; margin-top:10px; color:#1e73be; }
        .popup {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            background: #2ecc71;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Forgot Password</h2>

    {{-- Popup --}}
    @if(session('success'))
        <div class="popup" id="popup">{{ session('success') }}</div>
    @endif

    {{-- Error Message --}}
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

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('popup');
        if (popup) {
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 10000); 
        }
    });
</script>
</body>
</html>
