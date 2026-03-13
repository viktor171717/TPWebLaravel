<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
Route::get('/projects', [ProjectController::class, 'projects'])->name('projects');
Route::get('/tickets', [TicketController::class, 'tickets'])->name('tickets');
Route::get('/tickets/new', [TicketController::class, 'new_tickets'])->name('tickets.new');
Route::get('/tickets/detail', [TicketController::class, 'ticket_detail'])->name('tickets.detail');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
