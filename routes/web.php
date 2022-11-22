<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
})->name('index');

/* Route::get('/shop',function(){
    return view('product-details');
})->name('shop');
Route::get('/shopPro', function(){
    return view('shop');
})->name('shopPro'); */
Route::controller(ProductsController::class)->group(function(){
    Route::get('products', 'index')->name('products');
    Route::get('products/{id}','show');
});
Route::controller(UserController::class)->group(function(){
    Route::get('user', 'index');
});
Route::get('/carts',[CartsController::class, 'index'])->middleware('auth')->name('carts');

Route::get('/login', [RegisterController::class,'login'])->name('login');

Route::post('/login', [RegisterController::class,'login_action'])->name('login.action');



Route::get('/register', [RegisterController::class,'Register'])->name('register');
  
  Route::post('/register', [RegisterController::class,'Register_action'])->name('register.action');

  Route::get('/logout', [RegisterController::class,'logout'])->name('logout');