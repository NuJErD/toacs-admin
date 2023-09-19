<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\forgotpwdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\department;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\prController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\supplierTypeController;
use App\Models\supplier;
use App\Models\supplierType;
use Maatwebsite\Excel\Row;

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

Route::resource('categories',categoriesController::class);
Route::resource('supplierType',supplierTypeController::class);
Route::resource('supplier',supplierController::class);
Route::resource('pr',prController::class);
Route::resource('department',departmentController::class);

Route::get('/', function () {
    return view('login');
});
// login 

Route::post('/logincf', [loginController::class, 'logincheck'])->name('loginck');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/forgot', [forgotpwdController::class, 'index'])->name('forgot');
//user
Route::put('/updateuser/{user}',[userController::class, 'update'])->name('updateuser');
Route::get('/adduser',[userController::class, 'adduser'])->name('adduser');
Route::get('/resetPW',[userController::class,'changePW'])->name('changePW');
Route::post('/resetPWCF',[userController::class,'changePWCF'])->name('cfpass');



//Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//product
Route::get('/addproduct',[productController::class,'addproduct'])->name('additem');
Route::get('/item',[productController::class, 'index'])->name('item');
Route::put('/active/{product}',[productController::class,'active']);

//pr
Route::get('/prapprove',[prController::class,'pr_approve'])->name('pr_approve');
//user
Route::put('/pwreset/{user}',[userController::class,'resetPW']);


//import
Route::post('/import/user', [ExcelController::class, 'UserImport'])->name('import');
Route::post('/import/product', [ExcelController::class, 'ProductImport'])->name('importPD');
Route::post('/import/sup', [ExcelController::class, 'SupplierImport'])->name('importsup');

//Export
Route::get('/export/users', [ExcelController::class, 'Usersexport']);
Route::get('/export/products', [ExcelController::class, 'Productsexport'])->name('ProductExport');
Route::get('/export/suppliers', [ExcelController::class, ''])->name('SupplierExport');

//categories
Route::get('/addcategories',[categoriesController::class, 'addcategories'])->name('addcategories');

//supplier
Route::get('/addsupplier',[supplierController::class,'addsupplier'])->name('addsupplier');

//supplierType
Route::get('/addSpType',[supplierTypeController::class,'addSpType'])->name('addSpType');

//

