<?php

use App\Http\Controllers\Marketing;
use App\Http\Controllers\Security;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', Marketing\ShowIndexController::class)->name('index');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::post('/register', [Security\RegisteredUserController::class, 'store'])->name('register.store');
    Route::post('/login', [Security\AuthenticatedSessionController::class, 'store'])->name('login.store');
});

// Auth routes
Route::middleware('auth')->group(function () {
    // Debug route to check if it's registered
    Route::get('/debug/routes', function() {
        dd([
            'appointments.store' => route('appointments.store'),
            'current_routes' => Route::getRoutes()->getRoutesByMethod()['POST'] ?? []
        ]);
    });

    // Appointments routes
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    
    // Doctors routes
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
});

Route::delete('/logout', [Security\AuthenticatedSessionController::class, 'destroy'])->name('logout');
