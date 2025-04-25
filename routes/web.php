<?php

use App\Http\Controllers\BillingRecordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResourceTypeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::controller(HomeController::class)
        ->name('home')
        ->group(function () {
            Route::get('/', 'index')->name('.index');
    });

    Route::controller(ProjectController::class)
        ->name('project.')
        ->prefix('projects')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('{id}', 'show')->name('show');
    });

    Route::controller(ResourceTypeController::class)
        ->name('resource_type.')
        ->prefix('resource_types')
        ->group(function () {
            Route::get('{id}', 'show')->name('show');
    });

    Route::controller(TeamController::class)
        ->name('team.')
        ->prefix('teams')
        ->group(function () {
            Route::get('{id}', 'show')->name('show');
    });

    Route::controller(BillingRecordController::class)
        ->name('billing.')
        ->prefix('billings')
        ->group(function () {
            Route::get(
                '/', 'index'
            )->name('index');
        });

});


Route::middleware(['guest'])->controller(UserController::class)->name('registration.')->group(function () {
    Route::match(['get', 'post'],'/register', 'register')->name('register');
    Route::match(['get', 'post'], '/login', 'login')->name('login');
});
Route::middleware(['auth', 'auth.session'])->post('/logout', [UserController::class, 'logout'])->name('logout');