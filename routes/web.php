<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::controller(UserController::class)->name('registration.')->group(function () {
    Route::match(['get', 'post'],'/register', 'register')->name('register');
    Route::match(['get', 'post'], '/login', 'login')->name('login');
});