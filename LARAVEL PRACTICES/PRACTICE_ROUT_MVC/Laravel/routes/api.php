<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TaskController;
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

Route::get('/items', [PostController::class,'getAllItems']);

Route::get('/items/{id}', [PostController::class, 'getOneItems']);

Route::post('/items', [PostController::class, 'createItems']);

Route::delete('/items/{id}',[PostController::class, 'deleteItems']);
 
Route::put('/items/{id}', [PostController::class, 'updateItems']);

Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);