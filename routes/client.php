<?php

use App\Http\Controllers\Client\Auth\Login\LoginController;
use App\Http\Controllers\Client\Auth\Login\ShowLoginPageController;
use App\Http\Controllers\Client\Auth\Register\RegisterController;
use App\Http\Controllers\Client\Auth\Register\ShowRegisterPageController;
use App\Http\Controllers\Client\Auth\VerifyController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');
Route::get('login', ShowLoginPageController::class)->name('login-page');
Route::post('login', LoginController::class)->name('login');

Route::get('register', ShowRegisterPageController::class)->name('register-page');
Route::post('register', RegisterController::class)->name('register');

Route::get('email/verify/{id}/{hash}', VerifyController::class)
     ->name('verification.verify');