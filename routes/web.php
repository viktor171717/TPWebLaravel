<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContractController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.attempt');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'register'])->name('signup.store');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

    Route::resource('tickets', TicketController::class);

    Route::resource('projects', ProjectController::class);

    Route::get('projects/{project}/contract/create', [ContractController::class, 'create'])
        ->name('contracts.create');
    Route::put('contracts/{contract}', [ContractController::class, 'update'])
        ->name('contracts.update');
});
