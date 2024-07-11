<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\epep;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetUsageController;

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
    Route::resource('asset_usages', AssetUsageController::class);
    Route::get('get-asset-usages', [AssetUsageController::class, 'getAssetUsages'])->name('asset_usages.getAssetUsages');
    // Route::get('/loadapp', function(){return view('dashboard/layouts/app');});
    // Route::get('get-users', [UserController::class, 'getUsers'])->name('users.getUsers');
});

require __DIR__.'/auth.php';
