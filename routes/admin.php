<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {

    Route::get('/login', [AdminController::class, 'loginPage'])
            ->name('admin.login-page');

    Route::get('/register', [AdminController::class, 'registerPage'])
            ->name('admin.register-page');

    Route::post('/login', [AdminController::class, 'login'])
            ->name('admin.login');

    Route::post('/register', [AdminController::class, 'register'])
            ->name('admin.register');

    Route::post('/logout', [AdminController::class, 'logout'])
            ->name('admin.logout');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard')->middleware('admin');

});
