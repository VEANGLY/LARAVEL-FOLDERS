<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// GET USER BY API ROUTE MISSION-2
Route::get('/users', function () {
    global $users;
    return $users;
});

// FIND USER BY INDEX MISSION-3
Route::get('/users/{userId}', function ($userIndex) {
    global $users;
    if($userIndex < count($users)){
        return $users[$userIndex];
    }else{
        return "Cant' find user in index ".$userIndex;
    };
})->where('userId','[0-9]+');

// FIND THE SPECIFIC NAME OF USER MISSION-4
Route::get('/users/{userName}', function ($userName) {
    global $users;
    for($i=0;$i < count($users);$i++){
        if($userName == $users[$i]["name"]){
            return $users[$i];
        }else if(($i+1) == count($users)){
            return "Cant' find index with name ".$userName;
        };
    };
})->where('userName','[A-Za-z]+');

// USING WITH PREFIX API MISSION-5
Route::prefix('teacher')->group(function (){
    // GET USER BY API ROUTE MISSION-2
    Route::get('/users', function () {
        global $users;
        return $users;
    });
     
    // FIND USER BY INDEX MISSION-3
    Route::get('/{userId}', function ($userIndex) {
        global $users;
        if($userIndex < count($users)){
            return $users[$userIndex];
        }else{
            return "Cant' find user in index ".$userIndex;
        };
    })->where('userId','[0-9]+');
    
    // FIND THE SPECIFIC NAME OF USER MISSION-4
    Route::get('/{userName}', function ($userName) {
        global $users;
        for($i=0;$i < count($users);$i++){
            if($userName == $users[$i]["name"]){
                return $users[$i];
            }else if(($i+1) == count($users)){
                return "Cant' find index with name ".$userName;
            };
        };
    })->where('userName','[A-Za-z]+');
});

// MAKE GROUP FUNTION MISSION-6
Route::get('/users/{userIndex}/post/{postIndex}', function ($userIndex, $postIndex) {
    global $users;
    if($userIndex <count($users) && $postIndex < count($users[$userIndex]["posts"])){
        return $users[$userIndex]["posts"][$postIndex];
    }else{
        return "Can't find the post with Index ".$postIndex." for user ".$userIndex;
    }
})->where('userIndex','[0-9]+');
