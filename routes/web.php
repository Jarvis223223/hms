<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;


// Ui
Route::get('/', [UiController::class, 'index'])->name('home');
Route::get('/about', [UiController::class, 'about'])->name('about');

//Contact
Route::get('/contact', [UiController::class, 'contact'])->name('contact');

// Appointment
Route::post('/appointment', [UiController::class, 'appointment'])->name('appointment');
Route::get('/my_appointment', [UiController::class, 'myAppointment'])->name('my_appointment');
Route::get('/cancle_appointment/{id}', [UiController::class, 'cancleAppointment'])->name('cancle_appointment');


// Application Form
Route::middleware('auth')->group(function () {
    // Logout
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    // Register
    Route::get('register', [AuthController::class, 'register'])->name('registerForm');
    Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');

    // Login
    Route::get('login', [AuthController::class, 'login'])->name('loginForm');
    Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
});

// Admin
Route::prefix('admin')->middleware('isEmployer')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('index');

    Route::get('/show_appointment', [DashboardController::class, "showAppointment"])->name('show_appointment');

    Route::get('/approve/{id}', [DashboardController::class, "approve"])->name('approve');
    Route::get('/cancle/{id}', [DashboardController::class, "cancle"])->name('cancle');

    Route::resource('doctors', DoctorController::class);
});
