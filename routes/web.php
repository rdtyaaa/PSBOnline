<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard/user', [UserController::class, 'index']);
        Route::get('/dashboard/user/create', [UserController::class, 'create']);
        Route::post('/dashboard/user/create', [UserController::class, 'store']);
        Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit']);
        Route::put('/dashboard/user/edit/{id}', [UserController::class, 'update']);
        Route::delete('/dashboard/user/{id}', [UserController::class, 'destroy']);

        Route::get('/dashboard/registration', [RegistrationController::class, 'index']);
        Route::get('/dashboard/registration/create', [RegistrationController::class, 'create']);
        Route::post('/dashboard/registration/create', [RegistrationController::class, 'store']);
        Route::get('/dashboard/registration/edit/{id}', [RegistrationController::class, 'edit']);
        Route::put('/dashboard/registration/edit/{id}', [RegistrationController::class, 'update']);
        Route::delete('/dashboard/registration/{id}', [RegistrationController::class, 'destroy']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
