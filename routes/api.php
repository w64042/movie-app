<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\GeneralCinematography\DirectorController;
use App\Http\Controllers\GeneralCinematography\GenreController;
use App\Http\Controllers\Movies\MovieController;
use App\Http\Controllers\Series\SeriesController;
use App\Http\Controllers\UserController;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function () {

    Route::post('/send-reset-password', [ResetPasswordController::class, 'sendResetLinkEmail']);
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');


    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/register', [AuthController::class, 'register']);

        Route::middleware(['admin'])->group(function () {
            Route::get('/users', [UserController::class, 'index']);
            Route::post('/users', [UserController::class, 'store']);
            Route::put('/users/{id}', [UserController::class, 'update']);
            Route::delete('/users/{id}', [UserController::class, 'destroy']);

            Route::post('/movies', [MovieController::class, 'store']);
            Route::put('/movies/{id}', [MovieController::class, 'update']);
            Route::delete('/movies/{id}', [MovieController::class, 'destroy']);

            Route::post('/series', [SeriesController::class, 'store']);
            Route::put('/series/{id}', [SeriesController::class, 'update']);
            Route::delete('/series/{id}', [SeriesController::class, 'destroy']);

            Route::post('/directors', [DirectorController::class, 'store']);
            Route::put('/directors/{id}', [DirectorController::class, 'update']);
            Route::delete('/directors/{id}', [DirectorController::class, 'destroy']);

            Route::post('/genres', [GenreController::class, 'store']);
            Route::put('/genres/{id}', [GenreController::class, 'update']);
            Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
        });

        Route::get('/users/{id}', [UserController::class, 'show']);

        Route::get('/movies', [MovieController::class, 'index']);
        Route::get('/movies/{id}', [MovieController::class, 'show']);

        Route::get('/series', [SeriesController::class, 'index']);
        Route::get('/series/{id}', [SeriesController::class, 'show']);


        Route::get('/directors', [DirectorController::class, 'index']);
        Route::get('/directors/{id}', [DirectorController::class, 'show']);


        Route::get('/genres', [GenreController::class, 'index']);
        Route::get('/genres/{id}', [GenreController::class, 'show']);


        Route::get('/favorites', [FavouriteController::class, 'index']);
        Route::post('/favorites', [FavouriteController::class, 'store']);
        Route::delete('/favorites/{id}', [FavouriteController::class, 'destroy']);
        Route::get('/favorite-genre-hints', [FavouriteController::class, 'getHints']);

    });

});
