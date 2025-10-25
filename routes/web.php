<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Tambahkan route resource untuk employee
Route::resource('employees', EmployeeController::class);
