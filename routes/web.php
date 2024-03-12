<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class,'index']);
Route::get('products/detail/{id}', [ProductController::class, 'detail']);

// Route::post('products/', function (){});

Route::get('products/remove/{id}', [ProductController::class,'change_product_status']);

// Route::update('products/{id}', function(){

// });

Route::get('product/category/$id', [ProductController::class, 'filter']);