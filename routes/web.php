<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Admin\PetController;
use \App\Http\Controllers\UserProductController;

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

Route::get('/', [UserProductController::class,'index'])->name('user');

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware("isAdmin");

    Route::prefix("/category")->group(function () {
        Route::get('/', [AdminController::class, 'category'])->name('admin.category');
        Route::get('/add', [CategoryController::class, 'add'])->name('category.add');
        Route::post('/add', [CategoryController::class, 'handleAdd']);
        Route::get('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/update/{id}', [CategoryController::class, 'handleUpdate']);
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');;
    });



    Route::prefix("/product")->group(function () {
        Route::get('/', [AdminController::class, 'product'])->name('admin.product');
        Route::get('/add', [ProductController::class, 'add'])->name('product.add');
        Route::post('/add', [ProductController::class, 'handleAdd']);
        Route::get('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/update/{id}', [ProductController::class, 'handleUpdate']);
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::resource('/pet' , PetController::class);
});


Route::prefix('/auth')->group(function () {
   Route::get('/register',[UserController::class,'register'])->name('user.register') ;
   Route::post('/register',[UserController::class,'handleRegister']) ;
   Route::get('/login',[UserController::class,'login'])->name('user.login') ;
   Route::get('/logout',[UserController::class,'logout'])->name('user.logout') ;
   Route::post('/login',[UserController::class,'handleLogin']) ;
   Route::get('/admin-login',[UserController::class,'adminLogin'])->name('admin.login') ;
   Route::post('/admin-login',[UserController::class,'handleAdminLogin'])->name('admin.login') ;
});

