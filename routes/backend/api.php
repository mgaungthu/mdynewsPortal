<?php

use App\Http\Controllers\API\Backend\ArticleController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Backend\AuthController;
use App\Http\Controllers\Api\Backend\DashboardController;
use App\Http\Controllers\Api\Backend\UserController;



Route::prefix('v1/backend')->group(function () {

    // Login route
    Route::get('/login', function () {
        return response()->json([
            'message' => 'You need to log in to access this resource.'
        ]);
    })->name('api.backend.login.get');


    Route::post('/login', [AuthController::class, 'login'])->name('api.backend.login.post');
});



Route::domain('{subdomain}.spacenews.test')->middleware(['auth:api','check.subdomain'])->group(function () {
    // Route::get('/', function (string $subdomain) {
    //     dd($subdomain);
    // });

    // Add more routes for subdomain2 here

    Route::prefix('v1/backend')->group(function () {


        // Protected routes

            Route::get('/logout', [AuthController::class, 'logout'])->name('api.backend.logout');

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('api.backend.dashboard');

            Route::get('/article', [ArticleController::class, 'index'])->name('api.backend.article');

            Route::post('/article', [ArticleController::class, 'store'])->name('api.backend.article');

            // Route::get('/portal/{portal_id}/articles', [ArticleController::class, 'articlesByPortal']); // Get articles by portal

            // Super Admin Protection

            Route::group(['middleware' => 'role:admin'], function () {

                Route::apiResource('users', UserController::class);
                //
            });


            // User Management
            // Route::apiResource('users', UserController::class);
            // Route::apiResource('roles', RoleController::class);
            // Route::apiResource('permissions', PermissionController::class);
        
    });
});



