<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::as('auth.')
    ->prefix('auth')

    ->controller(AuthController::class)
    ->group(function () {
        Route::post('login', 'login')->name('login');
    });

Route::as('profile.')
    ->prefix('profile')

    ->middleware('auth')

    ->controller(ProfileController::class)
    ->group(function () {
        Route::put('', 'update')->name('update');
    });

Route::as('users.')
    ->prefix('users')

    ->middleware('auth')

    ->controller(UserController::class)
    ->group(function () {

        Route::post('', 'store')->name('store')
            ->can('create', User::class);

        Route::put('{user}', 'update')->name('update')
            ->can('update', User::class);

        Route::delete('{user}', 'destroy')->name('destroy')
            ->can('delete', User::class);

    });
