<?php

use App\Http\Controllers\Client\Auth\Login\LoginController;
use App\Http\Controllers\Client\Auth\Login\ShowLoginPageController;
use App\Http\Controllers\Client\Auth\LogoutController;
use App\Http\Controllers\Client\Auth\Register\RegisterController;
use App\Http\Controllers\Client\Auth\Register\ShowRegisterPageController;
use App\Http\Controllers\Client\Auth\VerifyController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Quiz\AskQuizController;
use App\Http\Controllers\Client\Quiz\ReplyQuizController;
use App\Http\Middleware\SetDefaultLocaleForUrlsMiddleware;
use App\Http\Middleware\SetupLocaleMiddleware;
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

Route::prefix('{locale?}')
     ->middleware([SetupLocaleMiddleware::class, SetDefaultLocaleForUrlsMiddleware::class])
     ->group(function () {
         Route::get('/', HomeController::class)->name('home');
         Route::get('login', ShowLoginPageController::class)->name('login-page');
         Route::post('login', LoginController::class)->name('login');

         Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');

         Route::get('register', ShowRegisterPageController::class)->name('register-page');
         Route::post('register', RegisterController::class)->name('register');

         Route::get('email/verify/{id}/{hash}', VerifyController::class)
              ->name('verification.verify');

         Route::prefix('dashboard')
              ->middleware('auth')
              ->name('dashboard.')
              ->group(function () {
                  Route::get('/', \App\Http\Controllers\Client\Dashboard\HomeController::class)->name('home');

                  Route::get('quiz', AskQuizController::class)->name('quiz');
                  Route::post('quiz/{question}', ReplyQuizController::class)->name('quiz.reply');
              });
     });
