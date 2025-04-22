<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['custom.auth'])->controller(HomeController::class)->name('home')->group(function () {
    Route::get('/', 'index')->name('.index');
});

Route::middleware(['custom.auth'])->controller(UserController::class)->name('registration.')->group(function () {
    Route::match(['get', 'post'],'/register', 'register')->name('register');
    Route::match(['get', 'post'], '/login', 'login')->name('login');
});
Route::middleware(['auth', 'auth.session'])->post('/logout', [UserController::class, 'logout'])->name('logout');

Route::controller(ProjectController::class)->name('project.')->prefix('projects')->group(function () {
    Route::get('/', 'index')->name('index');
});