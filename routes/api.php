<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegisterController;
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


Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::middleware('auth:sanctum')->group( function () {
    Route::get('products', [ProductController::class,'index']);
    Route::post('addCart', [ProductController::class,'addToCart']);
    Route::post('removeCart', [ProductController::class,'removeFromCart']);
    Route::post('checkOut', [ProductController::class,'checkOut']);
});
