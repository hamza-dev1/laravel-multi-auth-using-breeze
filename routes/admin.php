<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function() {

    Route::get('/login', [AdminController::class, 'loginPage'])
            ->name('admin_login');

})->middleware('admin');
