<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\forgotpwdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
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
//resource
Route::resource('user',userController::class);
Route::resource('product',productController::class);
Route::resource('login',logincontroller::class);
Route::resource('forgotpw',forgotpwdController::class);
Route::resource('home',HomeController::class);
Route::resource('items',itemController::class);
Route::resource('order',ordersController::class);


Route::get('/', function () {
    return view('home');
});
// login 

Route::post('/logincf', [loginController::class, 'logincheck'])->name('loginck');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/forgot', [forgotpwdController::class, 'index'])->name('forgot');
//user

Route::get('/adduser',[userController::class, 'adduser'])->name('adduser');

//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
//backend
Route::get('/homeBack', [HomeController::class, 'homeB'])->name('homeBack');
Route::get('/product', [productController::class, 'index'])->name('product');

Route::get('/item',[itemController::class, 'index'])->name('item');
//Order
Route::get('/pr',[ordersController::class, 'index'])->name('pr');
