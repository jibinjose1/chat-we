<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[UserController::class,'loginView'])->name('login.view');
Route::get('/home',[HomeController::class,'home'])->name('home');
// Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
Route::get('/register',[UserController::class,'registerView'])->name('register.view');
Route::post('/doRegister',[UserController::class,'doRegister'])->name('register');
Route::post('/doLogin',[UserController::class,'doLogin'])->name('login');
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/forgotPassword',[UserController::class,'forgotPassword'])->name('forgot.password');
Route::post('/sendResetMail',[UserController::class,'sendResetMail'])->name('sent.reset.mail');
Route::get('/resetPasswordView',[UserController::class,'resetPasswordView'])->name('reset.password.view');
Route::post('/resetPassword',[UserController::class,'resetPassword'])->name('reset.password');
