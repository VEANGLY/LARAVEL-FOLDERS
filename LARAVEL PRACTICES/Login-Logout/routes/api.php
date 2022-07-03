<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Public Routes
Route::get('register',[UserController::class,'getRegister']);
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::get('/items',[ItemController::class,'index']);
Route::get('/items/{id}',[ItemController::class,'show']);

//Private Route
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::put('/items/{id}',[ItemController::class,'update']);
    Route::post('/items',[ItemController::class,'store']);
    Route::delete('/items/{id}',[ItemController::class,'destroy']);
    Route::post('logout',[UserController::class,'logout']);
});
