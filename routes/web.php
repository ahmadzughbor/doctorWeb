<?php

use App\Http\Controllers\Marketing;
use App\Http\Controllers\Security;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Base routes
|--------------------------------------------------------------------------
*/
Route::get('/', Marketing\ShowIndexController::class)->name('index');
Route::get('/doctors', Marketing\ShowDoctorsController::class)->name('doctors');

Route::post('/register', [Security\RegisteredUserController::class, 'store'])->name('register.store')->middleware('guest');
Route::post('/login', [Security\AuthenticatedSessionController::class, 'store'])->name('login.store')->middleware('guest');
Route::delete('/logout', [Security\AuthenticatedSessionController::class, 'destroy'])->name('logout');
