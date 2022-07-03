<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
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
Route::get('users',[UserController::class,'index']);
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'logIn']);

//Private Route
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::apiresource('staff',StaffController::class);
    Route::post('logout',[UserController::class,'lognOut']);
});
