<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
