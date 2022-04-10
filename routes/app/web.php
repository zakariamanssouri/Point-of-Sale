<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\app;
use App\Http\Controllers\app\RoleController;
use App\Http\Controllers\app\UserController;
use App\Http\Controllers\app\DashboardController;
use App\Http\Controllers\app\CategoryController;
use App\Http\Controllers\app\ProductController;
use App\Http\Controllers\app\Client\OrderController;



//this file is used for routes for pos only


//dashboard route
Route::get('/dashboard', [DashboardController::class, 'index',])->name('app.index');

//users and roles routes
Route::prefix('/users')->name('users.')->middleware('auth')->group(function () {

    //roles routes
    Route::prefix('/roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');

    });

        //users route
        Route::get('/',[UserController::class,'index'])->name('index');
    Route::get('/create',[UserController::class,'create'])->name('create');
    Route::post('/',[UserController::class,'store'])->name('store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/users/{id}',[UserController::class,'update'])->name('update');
    Route::delete('/{id}',[UserController::class,'destroy'])->name('destroy');
});


//categories route
Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}',[CategoryController::class,'update'])->name('update');
    Route::delete('/{id}',[CategoryController::class,'destroy'])->name('destroy');
});


//products routes
Route::prefix('/products')->name('products.')->group(function () {
    Route::get('/productsearch',[ProductController::class,'searchproducts'])->name('searchproduct');
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}',[ProductController::class,'update'])->name('update');
    Route::delete('/{id}',[ProductController::class,'destroy'])->name('destroy');
});


//clients routes
Route::prefix('/clients')->name('clients.')->group(function () {
    Route::get('/',[app\ClientController::class,'index'])->name('index');
    Route::get('/create',[app\ClientController::class,'create'])->name('create');
    Route::post('/', [app\ClientController::class, 'store'])->name('store');
    Route::get('/{client}/edit', [app\ClientController::class, 'edit'])->name('edit');
    Route::put('/{id}',[app\ClientController::class,'update'])->name('update');
    Route::delete('/{id}',[app\ClientController::class,'destroy'])->name('destroy');
});


//clients orders routes
Route::prefix('/orders')->name('clients.orders.')->group(function () {
    Route::get('/',[OrderController::class,'index'])->name('index');
    Route::get('/create',[OrderController::class,'create'])->name('create');
    Route::get('/{id}',[OrderController::class,'show'])->name('show');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('edit');
    Route::put('/{id}',[OrderController::class,'update'])->name('update');
    Route::delete('/{id}',[OrderController::class,'destroy'])->name('destroy');
});










//just for testing

Route::get('/test',[\App\Http\Controllers\HomeController::class,'test']);
Route::post('/testform',[OrderController::class,'test'])->name("testform");
Route::get('/productsearch',[ProductController::class,'searchproducts'])->name('searchproduct');
