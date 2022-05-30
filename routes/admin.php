<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Post\CreatePostController;
use App\Http\Controllers\Admin\Post\DeletePostController;
use App\Http\Controllers\Admin\Post\EditPostController;
use App\Http\Controllers\Admin\Post\ListPostsController;
use App\Http\Controllers\Admin\Post\StorePostController;
use App\Http\Controllers\Admin\Post\UpdatePostController;
use App\Http\Controllers\Admin\Question\CreateQuestionController;
use App\Http\Controllers\Admin\Question\DeleteQuestionController;
use App\Http\Controllers\Admin\Question\EditQuestionController;
use App\Http\Controllers\Admin\Question\ListQuestionsController;
use App\Http\Controllers\Admin\Question\StoreQuestionController;
use App\Http\Controllers\Admin\Question\UpdateQuestionController;
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
        Route::get('{question}/edit', EditQuestionController::class)->name('edit');
        Route::post('{question}', UpdateQuestionController::class)->name('update');
        Route::delete('{question}', DeleteQuestionController::class)->name('delete');
    });

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', ListPostsController::class)->name('index');
        Route::get('create', CreatePostController::class)->name('create');
        Route::post('/', StorePostController::class)->name('store');
        Route::get('{post}/edit', EditPostController::class)->name('edit');
        Route::post('{post}', UpdatePostController::class)->name('update');
        Route::delete('{post}', DeletePostController::class)->name('delete');
    });
});
