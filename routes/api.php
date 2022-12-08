<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('permissions', PermissionController::class);
        Route::apiResource('roles', RoleController::class);
    });

    Route::get('/endpoint1', function () {
        return 'endpoint1';
    })->middleware(['permission:can access endpoint1']);

    Route::get('/endpoint2', function () {
        return 'endpoint2';
    })->middleware(['permission:can access endpoint2']);

    Route::get('/endpoint3', function () {
        return 'endpoint3';
    })->middleware(['permission:can access endpoint3']);

    Route::get('/endpoint4', function () {
        return 'endpoint4';
    })->middleware(['permission:can access endpoint4']);

});

