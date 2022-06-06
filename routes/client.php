<?php

use App\Http\Controllers\Client\Auth\AskForVerificationController;
use App\Http\Controllers\Client\Auth\Login\LoginController;
use App\Http\Controllers\Client\Auth\Login\ShowLoginPageController;
use App\Http\Controllers\Client\Auth\LogoutController;
use App\Http\Controllers\Client\Auth\Register\RegisterController;
use App\Http\Controllers\Client\Auth\Register\ShowRegisterPageController;
use App\Http\Controllers\Client\Auth\ResendVerificationController;
use App\Http\Controllers\Client\Auth\VerifyController;
use App\Http\Controllers\Client\Contact\ContactUsController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Post\ListPostsController;
use App\Http\Controllers\Client\Post\ShowPostController;
use App\Http\Controllers\Client\Quiz\AskQuizController;
use App\Http\Controllers\Client\Quiz\ReplyQuizController;
use App\Http\Controllers\Client\Settings\Password\UpdatePasswordController;
use App\Http\Controllers\Client\Settings\ShowSettingsPageController;
use App\Http\Controllers\Client\Settings\Subscription\RequestCancelSubscriptionController;
use App\Http\Controllers\Client\Subscribe\PaySubscriptionController;
use App\Http\Controllers\Client\Subscribe\ShowSubscriptionPageController;
use App\Http\Controllers\Client\Subscribe\ShowSuccessPageController;
use App\Http\Controllers\ResetPassword\EmailResetPasswordController;
use App\Http\Controllers\ResetPassword\SetNewPasswordController;
use App\Http\Controllers\ResetPassword\ShowResetPasswordController;
use App\Http\Controllers\ResetPassword\ShowResetPasswordFormController;
use App\Http\Middleware\HasVerifiedEmailAddressMiddleware;
use App\Http\Middleware\IsMissingQuizMiddleware;
use App\Http\Middleware\IsSubscribedMiddleware;
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

Route::prefix('{locale?}')->where(['locale' => 'en|fr|de|es|it'])
     ->middleware([SetupLocaleMiddleware::class, SetDefaultLocaleForUrlsMiddleware::class])
     ->group(function () {
         Route::post('contact', ContactUsController::class)->name('contact');

         Route::get('/', HomeController::class)->name('home');
         Route::get('login', ShowLoginPageController::class)->name('login-page');
         Route::post('login', LoginController::class)->name('login');

         Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');

         Route::get('register', ShowRegisterPageController::class)->name('register-page');
         Route::post('register', RegisterController::class)->name('register');

         Route::prefix('forgot-password')->name('password.')->group(function () {
             Route::get('/', ShowResetPasswordController::class)
                  ->middleware('guest')
                  ->name('request');

             Route::post('/', EmailResetPasswordController::class)
                  ->middleware('guest')
                  ->name('email');

             Route::get('{token}', ShowResetPasswordFormController::class)
                  ->name('reset');

             Route::post('update', SetNewPasswordController::class)
                  ->name('update');
         });
         Route::name('verification.')->group(function () {
             Route::get('email/verify/{id}/{hash}', VerifyController::class)
                  ->name('verify');

             Route::prefix('verification')->middleware('auth')->group(function () {
                 Route::get('/', AskForVerificationController::class)
                      ->name('ask');
                 Route::post('resend', ResendVerificationController::class)
                      ->name('resend');
             });
         });

         Route::prefix('dashboard')
              ->middleware('auth')
              ->name('dashboard.')
              ->group(function () {
                  Route::post('cancel-subscription', RequestCancelSubscriptionController::class)
                       ->name('cancel-subscription');

                  Route::name('password.')->group(function () {
                      Route::post('password', UpdatePasswordController::class)->name('update');
                  });

                  Route::prefix('subscribe')->name('subscribe.')->group(function () {
                      Route::get('/', ShowSubscriptionPageController::class)->name('show');
                      Route::get('success', ShowSuccessPageController::class)->name('success');
                      Route::post('/', PaySubscriptionController::class)->name('pay');
                  });

                  Route::middleware(IsSubscribedMiddleware::class)->group(function () {
                      Route::prefix('quiz')->middleware(HasVerifiedEmailAddressMiddleware::class)->name('quiz.')->group(function () {
                          Route::get('quiz', AskQuizController::class)->name('ask');
                          Route::post('quiz/{question}', ReplyQuizController::class)->name('reply');
                      });

                      Route::middleware([
                          IsMissingQuizMiddleware::class,
                          HasVerifiedEmailAddressMiddleware::class
                      ])->group(function () {
                          Route::get('/', ListPostsController::class)->name('home');

                          Route::prefix('posts')->name('posts.')->group(function () {
                              Route::get('{id}', ShowPostController::class)->name('show');
                          });
                      });

                      Route::prefix('settings')->name('settings.')->group(function () {
                          Route::get('/', ShowSettingsPageController::class)->name('index');
                      });
                  });
              });
     });
