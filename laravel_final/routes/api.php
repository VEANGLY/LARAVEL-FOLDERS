<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
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

//Basic Route
Route::apiresource('users',UserController::class);
Route::apiresource('posts',PostController::class);
Route::apiresource('comments',CommentController::class);
Route::apiresource('likes',LikeController::class);
// Advanced Routes
Route::get('users_posts_comments',[UserController::class,'getUserPostComment']);
Route::get('users_posts_comments_likes',[UserController::class,'getUserPostCommentLike']);
Route::get('users_posts_comments_likes/{id}',[UserController::class,'getUserPostCommentLikeWithId']);
Route::get('count_posts_comments',[UserController::class,'getCountPostAndComment']);

