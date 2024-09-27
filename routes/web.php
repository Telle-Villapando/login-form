<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('admin/dashboard', [AdminController::class,'userDisplay'])->name('admin.userDisplay')->
middleware(['auth', 'admin']);;
Route::get('admin/{user}/edit',[AdminController::class,'userEdit'])->name('admin.editUser');
Route::put('admin/{user}/update', [AdminController::class,'userUpdate'])->name('admin.userUpdate');
Route::delete('admin/{user}/delete',[AdminController::class,'deleteUser'])->name('admin.deleteUser');
//Route::get('user/userProfile', [UserController::class,'userProfile'])->name('user.userProfile');

Route::get('user/{user}/profile', [UserController::class,'profile'])->name('user.profile');
Route::get('user/{user}/profile/public',[UserController::class,'publicProfile'])->name('user.publicProfile');
Route::put('user/{user}/profile/update', [UserController::class,'profileUpdate'])->name('user.profileUpdate');
Route::get('user/cancel',[UserController::class,'cancelProfileUpdate'])->name('user.cancelProfileUpdate');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::put('/user/update-avatar', [UserController::class, 'updateAvatar'])->name('user.updateAvatar');

//Route::get('user/forgot/password',[UserController::class,'forgotPassword'])->name('user.forgotPassword');
//Route::post('user/forgetPassword/email',[ForgetPasswordController::class,'forgetPasswordPost'])->name('user.forgetPasswordPost');
//Route::get('user/resetPassword/{token}',[ForgetPasswordController::class,'resetPassword'])->name('user.resetPassword');
//Route::post('user/resetPassword', [ForgetPasswordController::class, 'resetPasswordPost'])->name('user.resetPasswordPost');

// Route for forgot password form (GET)
Route::get('user/forgot/password', [UserController::class, 'forgotPassword'])->name('user.forgotPassword');

// Route for submitting forgot password request (POST)
Route::post('user/forgetPassword/email', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('user.forgetPasswordPost');

// Route for reset password form (GET)
Route::get('user/resetPassword/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('user.resetPassword');

// Route for submitting new password (POST)
Route::post('user/resetPassword', [ForgetPasswordController::class, 'resetPasswordPost'])->name('user.resetPasswordPost');
