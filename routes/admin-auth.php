<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;


use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create']);

    Route::post('register', [RegisteredUserController::class, 'store'])->name('admin.register');

    Route::get('login', [LoginController::class, 'create']);

    Route::post('login', [LoginController::class, 'store'])->name('admin.login');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // admin dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::post('logout', [ LoginController::class, 'destroy'])->name('admin.logout');
});
