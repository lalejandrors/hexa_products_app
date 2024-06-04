<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categoria')->group(function () {
    Route::get('', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'find']);
    Route::post('', [CategoriaController::class, 'store']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});

Route::prefix('producto')->group(function () {
    Route::get('', [ProductoController::class, 'index']);
    Route::get('/{id}', [ProductoController::class, 'find']);
    Route::get('/categoria/{id}', [ProductoController::class, 'findByCategory']);
    Route::get('/precio/{from}/{to}', [ProductoController::class, 'findByPrice']);
    Route::get('/listaprecio/{limit}', [ProductoController::class, 'findPricesList']);
    Route::post('', [ProductoController::class, 'store']);
    Route::put('/{id}', [ProductoController::class, 'update']);
    Route::delete('/{id}', [ProductoController::class, 'destroy']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});
