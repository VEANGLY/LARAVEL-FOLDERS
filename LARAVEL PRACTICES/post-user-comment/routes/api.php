<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

//User Route
Route::get("/users",[UserController::class, 'index']);
Route::post("/users",[UserController::class, 'store']);
Route::get("/users/{id}",[UserController::class, 'show']);
Route::delete("/users/{id}",[UserController::class, 'destroy']);
Route::put("/users/{id}",[UserController::class, 'update']);

//PostRoute
Route::get("/posts",[PostController::class, 'index']);
Route::post("/posts",[PostController::class, 'store']);
Route::get("/posts/{id}",[PostController::class, 'show']);
Route::delete("/posts/{id}",[PostController::class, 'destroy']);
Route::put("/posts/{id}",[PostController::class, 'update']);

// Comment Route
Route::get("/comments",[CommentController::class, 'index']);
Route::post("/comments",[CommentController::class, 'store']);
Route::get("/comments/{id}",[CommentController::class, 'show']);
Route::delete("/comments/{id}",[CommentController::class, 'destroy']);
Route::put("/comments/{id}",[CommentController::class, 'update']);
