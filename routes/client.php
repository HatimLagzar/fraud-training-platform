<?php

use App\Http\Controllers\Client\Auth\VerifyController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Register\RegisterController;
use App\Http\Controllers\Client\Register\ShowRegisterPageController;
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
Route::get('login', ShowRegisterPageController::class)->name('login-page');
Route::get('register', ShowRegisterPageController::class)->name('register-page');
Route::post('register', RegisterController::class)->name('register');

Route::get('email/verify/{id}/{hash}', VerifyController::class)
     ->name('verification.verify');