<?php

use App\Http\Controllers\detailController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\manageUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\updateProductController;
use App\Http\Controllers\updateUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/home',[updateProductController::class, 'list'])->middleware('check');

Route::get('/register', function () {return view('register');});
Route::post('/store',[registerController::class, 'store']);

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->middleware('guest');
Route::get('/logout', [loginController::class, 'logout']);

Route::get('/insertproduct', [ProductController::class, 'index'])->middleware('check');
Route::post('/insertproduct', [ProductController::class, 'store'])->middleware('check');
Route::get('/edit/{id}', [updateProductController::class, 'edit'])->middleware('check');
Route::post('/update/{id}', [updateProductController::class, 'update'])->middleware('check');

Route::get('/manageuser', [manageUserController::class, 'list'])->middleware('check');
Route::get('/delete/{id}', [manageUserController::class, 'delete'])->middleware('check');

Route::get('/edituser', [updateUserController::class, 'edit'])->middleware('check');
Route::post('/updateuser', [updateUserController::class, 'update'])->middleware('check');

Route::get('/product/{product}/detail',[detailController::class,'index'])->name('productdetail')->middleware('check');

Route::post('/addtocart', [ProductController::class, 'addtocart'])->middleware('check');
Route::get('/cart',[ProductController::class, 'cartlist'])->middleware('check');

Route::get('/delete/{id}', [ProductController::class, 'deletecart'])->middleware('check');

Route::get('/user/{user}/role', [updateUserController::class, 'userrole'])->name('userrole')->middleware('check');

Route::post('/storerole/{id}', [updateUserController::class, 'storerole'])->middleware('check');
