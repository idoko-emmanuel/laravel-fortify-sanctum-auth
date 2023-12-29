<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\{AuthenticatedSessionController, RegisteredUserController,PasswordResetLinkController};

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


Route::group(['middleware' => 'auth:sanctum'], function() {

    // Authentication routes 
    Route::prefix('auth')->withoutMiddleware('auth:sanctum')->group(function () {
        // Retrieve the limiter configuration for login attempts
        $limiter = config('fortify.limiters.login');

        // Route for user login
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:'.config('fortify.guard'),  // Only guests (non-authenticated users) are allowed
                $limiter ? 'throttle:'.$limiter : null,  // Throttle login attempts if limiter is configured
            ]));

        // Route for user registration
        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware('guest:'.config('fortify.guard'));  // Only guests (non-authenticated users) are allowed

        // Route for initiating password reset
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->middleware('guest:'.config('fortify.guard'))  // Only guests (non-authenticated users) are allowed
            ->name('password.email');  // Name for the route
    });

});