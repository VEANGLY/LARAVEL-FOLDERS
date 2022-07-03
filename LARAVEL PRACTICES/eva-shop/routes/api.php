<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Public Routes
Route::get('create',[UserController::class,'getAllListAcount']);
Route::post('create',[UserController::class,'createAccount']);
Route::post('signin',[UserController::class,'signIn']);

//Private Route
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/products/{id}',[ProductController::class,'show']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::post('/products',[ProductController::class,'store']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('signout',[UserController::class,'signOut']);
});
