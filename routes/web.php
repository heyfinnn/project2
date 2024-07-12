<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\epep;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::resource('asset', AssetController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('getEmployees', [EmployeeController::class, 'getEmployees'])->name('employees.getEmployees');
    Route::resource('tasks', TaskController::class);
    Route::get('getTasks', [TaskController::class, 'getTasks'])->name('tasks.getTasks');
});

require __DIR__.'/auth.php';
