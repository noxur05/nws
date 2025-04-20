<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

// Route::get('/register', [UserController::class, 'register']);

Route::controller(UserController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
});