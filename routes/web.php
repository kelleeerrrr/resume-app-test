<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Signup Routes
Route::get('/signup', function() { 
    return view('signup'); 
});

// Redirect GET /register to /signup to avoid MethodNotAllowed
Route::get('/register', function() {
    return redirect('/signup');
});

// POST /register to store user
Route::post('/register', [AuthController::class, 'register']);

// Login Routes
Route::get('/login', function() { 
    return view('login'); 
});
Route::post('/login', [AuthController::class, 'login']);

// Forgot Password Routes
Route::get('/forgot-password', function() {
    return view('forgot-password');
});
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// Reset Password Routes
Route::get('/reset-password/{token}', function($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Resume Page (Protected)
Route::get('/resume', function() {
    if (!session()->has('user_id')) {
        return redirect('/login'); 
    }

    $resumeData = [
        'fullname' => 'Irish Rivera',
        'dob' => 'January 17, 2005',
        'pob' => 'Tinga Itaas, Batangas City',
        'civil_status' => 'Single',
        'specialization' => 'Computer Science',
        'email' => '23-00679@g.batstate-u.edu.ph',
        'phone' => '09362695155',
        'address' => 'Tinga Itaas, Batangas City',
        'education' => [
            ["level"=>"Elementary", "school"=>"Tinga Itaas Elementary School", "year"=>"2017"],
            ["level"=>"Secondary", "school"=>"STI - Batangas", "year"=>"2023"],
            ["level"=>"Tertiary", "school"=>"Batangas State University - TNEU (Alangilan Campus)", "year"=>"Present"]
        ],
        'organization' => ["name"=>"ACCESS, JPCS", "position"=>"Member", "year"=>"Present"],
        'interests' => ["Software Development", "Artificial Intelligence", "Web Development", "Cybersecurity"],
        'skills' => [
            "Teamwork"=>"Works effectively in group settings to achieve shared goals.",
            "Problem Solving"=>"Able to analyze challenges and find efficient solutions.",
            "Critical Thinking"=>"Thinks logically and evaluates information before making decisions.",
            "Communication"=>"Expresses ideas clearly in both written and spoken form."
        ],
        'programming' => [
            "HTML"=>"For structuring web pages.",
            "CSS"=>"For designing and styling web pages.",
            "PHP"=>"For backend web development.",
            "JavaScript"=>"For interactive and dynamic web content.",
            "Python"=>"For data analysis, AI, and backend development.",
            "Java"=>"For cross-platform applications and Android development."
        ],
        'awards' => ["Dean’s Lister - First Year, First Semester (2023-2024)"]
    ];

    return view('resume', $resumeData);
});

// Logout
Route::get('/logout', function() {
    Session::forget('user_id');
    return redirect('/');
});
