<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//User Routes
Route::post('/AddUser',[UserController::class,'AddUser']);
Route::get('/DeleteUser/{id}',[UserController::class,'DeleteUser']);
Route::get('/SelectUser',[UserController::class,'SelectUser']);
Route::post('/UpdateUser',[UserController::class,'UpdateUser']);

//Category Routes
Route::post('/AddCategory',[CategoryController::class,'AddCategory']);
Route::get('/SelectCategory',[CategoryController::class,'SelectCategory']);
Route::get('/DeleteCategory/{id}',[CategoryController::class,'DeleteCategory']);
Route::post('/UpdateCategoryWithImage',[CategoryController::class,'UpdateCategoryWithImage']);
Route::post('/UpdateCategoryWithoutImage',[CategoryController::class,'UpdateCategoryWithoutImage']);

//Product Routes
Route::post('/AddProduct',[ProductController::class,'AddProduct']);
Route::get('/SelectProduct',[ProductController::class,'SelectProduct']);
Route::get('/DeleteProduct/{id}',[ProductController::class,'DeleteProduct']);
Route::post('/UpdateProductWithImage',[ProductController::class,'UpdateProductWithImage']);
Route::post('/UpdateProductWithoutImage',[ProductController::class,'UpdateProductWithoutImage']);
Route::get('/SelectProductByCategory/{Category}',[ProductController::class,'SelectProductByCategory']);


//Cart Routes
Route::post('/AddCart',[CartController::class,'AddCart']);
Route::get('/CartItemPlus/{id/{quantity}/{price}}',[CartController::class,'CartItemPlus']);
Route::get('/CartItemMinus/{id}/{quantity}/{price}',[CartController::class,'CartItemMinus']);
Route::get('/RemoveCartList/{id}',[CartController::class,'RemoveCartList']);
Route::get('/CartList/{invoice}',[CartController::class,'CartList']);
//Dashboard Routes
Route::get('/CountProduct',[DashboardController::class,'CountProduct']);
Route::get('/CountCategory',[DashboardController::class,'CountCategory']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
