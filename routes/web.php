<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('catalog.index');
});

Auth::routes();



Route::prefix('products')->middleware('role:admin')->group(function () {
  Route::resource('product',ProductController::class);
});



Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::resource('order', OrderController::class);
Route::prefix('order')->group(function () {
    Route::post('/add-item', [OrderController::class, 'addItem'])->name('order.add-item');
});
