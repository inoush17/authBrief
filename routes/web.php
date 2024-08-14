<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');


Route::get('/', [ViewController::class, 'login'])->name('login');
Route::get('/login', [ViewController::class, 'login'])->name('login');

Route::get('/registration', [ViewController::class, 'registration'])->name('registration');
Route::get('/logout', [ViewController::class, 'logout'])->name('logout');


// Route::get('/', function () {
//     return view('login');
// });

