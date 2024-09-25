<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'registerRoute'])->name('user.register');
Route::get('/signIn', [AuthController::class, 'signInRoute'])->name('user.signIn');
Route::get('user/dashboard', [AuthController::class,'userDashboard'])->name('user.dashboard');

Route::post('/register/user', [AuthController::class,'registerUser'])->name('registered.user');

Route::get('signIn/user', [AuthController::class,'signInUser'])->name('signedIn.user');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('admin/dashboard', [HomeController::class,'adminDasboard'])->
middleware(['auth', 'admin']);