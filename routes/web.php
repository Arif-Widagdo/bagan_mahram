<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NephewController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::resource('dashboard', DashboardController::class);
Route::get('search', [DashboardController::class, 'search'])->name('search');

Route::resource('keponakan', NephewController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
