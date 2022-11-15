<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {

    Route::get('/login', [AdminController::class, 'loginPage'])
            ->name('admin.login');

    Route::get('/register', [AdminController::class, 'registerPage'])
            ->name('admin.register');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

});
