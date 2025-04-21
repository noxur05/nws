<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::controller(UserController::class)->name('registration.')->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'register')->name('register');
});