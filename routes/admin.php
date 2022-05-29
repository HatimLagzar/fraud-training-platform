<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Question\CreateQuestionController;
use App\Http\Controllers\Admin\Question\DeleteQuestionController;
use App\Http\Controllers\Admin\Question\ListQuestionsController;
use App\Http\Controllers\Admin\Question\StoreQuestionController;
use App\Http\Middleware\IsAdminMiddleware;
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

Route::get('login', LoginController::class)
     ->name('login');

Route::post('login', AuthenticateController::class)
     ->name('authenticate');

Route::middleware(IsAdminMiddleware::class)->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::prefix('questions')->name('questions.')->group(function () {
        Route::get('/', ListQuestionsController::class)->name('index');
        Route::get('create', CreateQuestionController::class)->name('create');
        Route::post('/', StoreQuestionController::class)->name('store');
        Route::delete('{question}', DeleteQuestionController::class)->name('delete');
    });
});
