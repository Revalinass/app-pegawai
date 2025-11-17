<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('salaries/verify', [SalaryController::class, 'verify'])->name('salaries.verify');
Route::middleware(['auth'])->group(function () {
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('salaries/{salary}/download-slip', [SalaryController::class, 'downloadSlip'])
        ->name('salaries.downloadSlip');
// Resource Routes
Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('positions', PositionController::class);
Route::resource('leaves', LeaveController::class);
}); 