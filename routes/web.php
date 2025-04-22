<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['custom.auth'])->get('/', function () {
    return view('home.index');
})->name('home');

Route::middleware(['custom.auth'])->controller(UserController::class)->name('registration.')->group(function () {
    Route::match(['get', 'post'],'/register', 'register')->name('register');
    Route::match(['get', 'post'], '/login', 'login')->name('login');
});
Route::middleware(['auth', 'auth.session'])->post('/logout', [UserController::class, 'logout'])->name('logout');