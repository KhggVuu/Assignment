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
//Home store
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
//Product admin dashboard
Route::get('P-list', [ProductController::class, 'index']);

Route::get('A-product', [ProductController::class, 'AddProduct']);

Route::post('save', [ProductController::class, 'SaveProduct']);

Route::get('edit/{id}', [ProductController::class, 'edit']);

Route::post('update', [ProductController::class, 'update']);

Route::get('delete/{id}', [ProductController::class, 'delete']);

//Category admin dashboard


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index'] );

    //Category admin dashboard
    Route::get('category', [App\Http\Controllers\admin\CategoryController::class, 'index']);
    Route::get('category/create', [App\Http\Controllers\admin\CategoryController::class, 'create']);
    Route::post('category/save', [App\Http\Controllers\admin\CategoryController::class, 'store']);
    Route::get('category/delete/{id}', [App\Http\Controllers\admin\CategoryController::class, 'deleteC']);
    Route::get('category/edit/{id}', [App\Http\Controllers\admin\CategoryController::class, 'editC']);
    Route::post('category/update', [App\Http\Controllers\admin\CategoryController::class, 'updateC']);

    //Producer admin dashboard
    Route::get('producer', [App\Http\Controllers\admin\ProducerController::class, 'index']);
    Route::get('producer/create', [App\Http\Controllers\admin\ProducerController::class, 'create']);
    Route::post('producer/save', [App\Http\Controllers\admin\ProducerController::class, 'saveP']);
    Route::get('producer/delete/{id}', [App\Http\Controllers\admin\ProducerController::class, 'deleteP']);
    Route::get('producer/edit/{id}', [App\Http\Controllers\admin\ProducerController::class, 'editP']);
    Route::post('producer/update', [App\Http\Controllers\admin\ProducerController::class, 'updateP']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
