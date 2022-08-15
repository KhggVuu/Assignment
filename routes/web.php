<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('P-list', [ProductController::class, 'index']);

Route::get('A-product', [ProductController::class, 'AddProduct']);

Route::post('save', [ProductController::class, 'SaveProduct']);

Route::get('edit/{id}', [ProductController::class, 'edit']);

Route::post('update', [ProductController::class, 'update']);

Route::get('delete/{id}', [ProductController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'] );
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
