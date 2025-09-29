<!DOCTYPE html>
<html>
<head>
    <title>Welcome - Resume App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin:0; 
            background:#f0f2f5; 
            display:flex; 
            justify-content:center; 
            align-items:center; 
            height:100vh; 
        }
        .container {
            background:white;
            border-radius:12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            max-width:400px;
            width:100%;
            text-align:center;
            padding:40px 30px;
            border: 2px solid #1e73be; /* subtle blue border */
        }
        h1 {
            color:#1e73be;
            margin-bottom:20px;
            font-size:2em;
        }
        p {
            color:#555;
            font-size:1.1em;
            margin-bottom:30px;
        }
        .btn {
            display:block;
            width:80%;
            margin:10px auto;
            padding:12px 0;
            font-size:1em;
            border:none;
            border-radius:8px;
            cursor:pointer;
            transition: all 0.3s ease;
            text-decoration:none;
            color:white;
        }
        .btn-signup { background:#2ecc71; }
        .btn-signup:hover { background:#27ae60; transform: translateY(-2px); }

        .btn-login { background:#1e73be; }
        .btn-login:hover { background:#155a9c; transform: translateY(-2px); }

        .icon { margin-right:8px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <p>Please choose an option to get started</p>
        <a href="/signup" class="btn btn-signup"><i class="fas fa-user-plus icon"></i> Sign Up</a>
        <a href="/login" class="btn btn-login"><i class="fas fa-sign-in-alt icon"></i> Login</a>
    </div>
</body>
</html>
