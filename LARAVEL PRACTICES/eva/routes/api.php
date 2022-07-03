<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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

Route::get('/users',[UserController::class,'index']);
Route::get('/users',[UserController::class,'store']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::get('/users/{id}',[UserController::class,'update']);
Route::get('/users/{id}',[UserController::class,'destroy']);

Route::get('/items',[ItemController::class,'index']);
Route::get('/items',[ItemController::class,'store']);
Route::get('/items/{id}',[ItemController::class,'show']);
Route::get('/items/{id}',[ItemController::class,'update']);
Route::get('/items/{id}',[ItemController::class,'destroy']);

Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories',[CategoryController::class,'store']);
Route::get('/categories/{id}',[CategoryController::class,'show']);
Route::get('/categories/{id}',[CategoryController::class,'update']);
Route::get('/categories/{id}',[CategoryController::class,'destroy']);
