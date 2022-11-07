<?php

use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\DB;
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
    return view('index');
})->name('index');

Route::get('/shop',function(){
    return view('product-details');
})->name('shop');
Route::get('/shopPro', function(){
    return view('shop');
})->name('shopPro');



Route::get('/login', function(){
  return view('login') ;
});

Route::get('/register', function(){
    return view('register') ;
  });


Route::post('/login', [UserController::class,'Login'])->name('login');
Route::post('/register', [UserController::class,'RegisterController'])->name('register');