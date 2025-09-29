@if (session('success'))
    <div style="color: green; font-weight: bold; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<!DOCTYPE html>
<html>
<head>
    <title>Resume - {{ $fullname }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 8px;
            overflow: hidden;
        }
        .left {
            background: #1e73be;
            color: white;
            width: 35%;
            padding: 20px;
        }
        .left img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: block;
            margin: 0 auto 20px auto;
            border: 3px solid white;
            object-fit: cover;
        }
        .left h2 {
            border-bottom: 2px solid white;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .left p {
            margin: 5px 0;
        }
        .right {
            width: 65%;
            padding: 20px;
        }
        .right h2 {
            background: #1e73be;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        ul {
            list-style: none;
            padding-left: 15px;
        }
        ul li {
            margin: 8px 0;
        }
        .skill-inline {
            margin: 8px 0;
        }
        .skill-inline strong {
            font-weight: bold;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .btn {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
        .print-btn {
            background: #2ecc71;
        }
        .print-btn:hover {
            background: #27ae60;
        }
        .logout-btn {
            background: #e74c3c;
        }
        .logout-btn:hover {
            background: #c0392b;
        }
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .btn-group {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Panel -->
        <div class="left">
            <img src="{{ asset('profile.jpg') }}" alt="Profile Picture">
            <h2>Personal Information</h2>
            <p><strong>Date of Birth:</strong> {{ $dob }}</p>
            <p><strong>Place of Birth:</strong> {{ $pob }}</p>
            <p><strong>Civil Status:</strong> {{ $civil_status }}</p>
            <p><strong>Field of Specialization:</strong> {{ $specialization }}</p>

            <h2>Organization</h2>
            <p><strong>Organization:</strong> {{ $organization['name'] }}</p>
            <p><strong>Position:</strong> {{ $organization['position'] }}</p>
            <p><strong>Year:</strong> {{ $organization['year'] }}</p>

            <h2>Field of Interest</h2>
            <ul>
                @foreach ($interests as $interest)
                    <li>{{ $interest }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Right Panel -->
        <div class="right">
            <h1>{{ strtoupper($fullname) }}</h1>
            <p>{{ $address }}<br>
            {{ $email }}<br>
            {{ $phone }}</p>

            <h2>Educational Background</h2>
            @foreach ($education as $edu)
                <p><strong>{{ $edu['level'] }}:</strong> {{ $edu['school'] }} ({{ $edu['year'] }})</p>
            @endforeach

            <h2>Skills</h2>
            <ul>
                @foreach ($skills as $skill => $desc)
                    <li class="skill-inline"><strong>{{ $skill }}:</strong> {{ $desc }}</li>
                @endforeach
            </ul>

            <h2>Programming Languages</h2>
            <ul>
                @foreach ($programming as $lang => $desc)
                    <li class="skill-inline"><strong>{{ $lang }}:</strong> {{ $desc }}</li>
                @endforeach
            </ul>

            <h2>Awards and Recognitions</h2>
            <ul>
                @foreach ($awards as $award)
                    <li>{{ $award }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Buttons below the container -->
    <div class="btn-group">
        <button class="btn print-btn" onclick="window.print()">🖨 Print Resume</button>
        <a href="/logout" class="btn logout-btn">Logout</a>
    </div>
</body>
</html>
