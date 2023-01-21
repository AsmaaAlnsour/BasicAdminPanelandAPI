<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('home');
Route::get('/dashboard', [AuthenticatedSessionController::class, 'create'])->name('admin');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // admins Route
    Route::group(['prefix' => 'admins'], function () {
        $permission = 'admins';
        $controller = AdminController::class;
        Route::get('/', [$controller, 'index'])->name($permission);
        Route::get('create', [$controller, 'create'])->name($permission . '.create');
        Route::post('store', [$controller, 'store'])->name($permission . '.store');
        Route::get('edit/{id}', [$controller, 'edit'])->name($permission . '.edit');
        Route::post('update/{id}', [$controller, 'update'])->name($permission . '.update');
    });

    // customers Route
    Route::group(['prefix' => 'customers'], function () {
        $permission = 'customers';
        $controller = CustomerController::class;

        Route::get('/', [$controller, 'index'])->name($permission);
        Route::get('create', [$controller, 'create'])->name($permission . '.create');
        Route::post('store', [$controller, 'store'])->name($permission . '.store');
        Route::get('edit/{id}', [$controller, 'edit'])->name($permission . '.edit');
        Route::post('update/{id}', [$controller, 'update'])->name($permission . '.update');
        Route::get('delete/{id}', [$controller, 'delete'])->name($permission . '.delete');
        Route::get('orders/{id}', [$controller, 'orders'])->name($permission . '.orders');
        Route::get('order/{id}', [$controller, 'order'])->name($permission . '.order.show');

    });



    // products Route
    Route::group(['prefix' => 'products'], function () {
        $permission = 'products';
        $controller = ProductController::class;

        Route::get('/', [$controller, 'index'])->name($permission);
        Route::get('create', [$controller, 'create'])->name($permission . '.create');
        Route::post('store', [$controller, 'store'])->name($permission . '.store');
        Route::get('edit/{id}', [$controller, 'edit'])->name($permission . '.edit');
        Route::post('update/{id}', [$controller, 'update'])->name($permission . '.update');
        Route::get('delete/{id}', [$controller, 'delete'])->name($permission . '.delete');
    });

});



require __DIR__ . '/auth.php';
