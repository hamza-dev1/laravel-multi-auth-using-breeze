<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::prefix('author')->group(function () {

    Route::get('/login', [AuthorController::class, 'loginPage'])
            ->name('author.login-page');

    Route::get('/register', [AuthorController::class, 'registerPage'])
            ->name('author.register-page');

    Route::get('/dashboard', [AuthorController::class, 'dashboard'])
            ->name('author.dashboard')->middleware('author');

    Route::post('/login', [AuthorController::class, 'login'])
            ->name('author.login');

    Route::post('/register', [AuthorController::class, 'register'])
            ->name('author.register');
});
