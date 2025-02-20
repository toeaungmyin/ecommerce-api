<?php

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

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

    Route::middleware('role:admin')->group(function () {
        Route::apiResource('admin/products', 'App\Http\Controllers\Admin\ProductController');
        Route::apiResource('admin/orders', 'App\Http\Controllers\Admin\OrderController');
        Route::apiResource('admin/users', 'App\Http\Controllers\Admin\UserController');
    });

    Route::apiResource('user/products', 'App\Http\Controllers\User\ProductController');
    Route::apiResource('user/orders', 'App\Http\Controllers\User\OrderController');
});
