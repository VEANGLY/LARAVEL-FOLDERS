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

Route::get('/items',function(){
    return "This is GET request for all itmes";
});

Route::get('/items/{id}',function($id){
    return "This is GET request for all itmes by: ".$id;
});

Route::post('/items',function(){
    return "This is post request for all itmes.";
});

Route::put('/items',function(){
    return "This is PUT request for all itmes.";
});

Route::delete('/items',function(){
    return "This is delete request for all itmes.";
});

// ACTIVITY 5
global $students;
$students = [
    ['name'=>'Veang','age'=>30],
    ['name'=>'Tim','age'=>50],
    ['name'=>'Phandy','age'=>60],
    ['name'=>'Sopha','age'=>20],
    ['name'=>'Sophim','age'=>60]
];
Route::get('/students',function(){
    global $students;
    return $students;
});

Route::get('/items/{id}',function($id){
    return "This is GET request for all itmes by: ".$id;
});

Route::post('/items',function(){
    return "This is post request for all itmes.";
});

Route::put('/items',function(){
    return "This is PUT request for all itmes.";
});