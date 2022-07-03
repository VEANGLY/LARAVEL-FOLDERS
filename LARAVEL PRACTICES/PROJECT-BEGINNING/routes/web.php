<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/sell', function () {
    return view('sell');
});
Route::get('/teacher', function () {
    return "<h1 style='color: red'>Good morning teacher...</h1>";
});

Route::get('/students/{id}/age/{age}', function ($id,$age) {
    return 'Student iid: <h1 style="color:red;">'.$id."</h1>and student age: <h1>".$age."</h1>";
});

Route::get('/task/{title?}', function ($task="null") {
    return "Task title: ".$task;
});

Route::get('/items/name/{book}/price/{price}', function ($book,$price) {
    return "Item name: ".$book."and price is: ".$price;
});

Route::get('/post/{title?}/author/{name?}', function ($post="null",$author="null") {
    return "Post title is: ".$post. "and author is: ".$author;
});

Route::get('/task/{name}/id/{id}', function ($task,$id) {
    return "Task title :".$task." and id: ".$id;
})->where(['name' =>'[A-Za-z]+','id'=>'[0-9]+']);

Route::fallback(function () {
    return "404 page is not found.";
});


Route::prefix("admin")->group(function () {
    Route::get('/users', function () {
        return "I am users!";
    });
    Route::get('/posts', function () {
        return "I am product!";
    });
});

Route::get('/products/{name}',function ($products){
    return "Book name is: ".$products;
});

Route::prefix("students")->group(function(){
    Route::get('/age/{age}',function($age){
        return "Student's age is: ".$age;
    });
    Route::get('/gender/{gender}',function($gender){
        return "Student's gender is: ".$gender;
    });
    Route::get('/name/{name}',function($name){
        return "Student's name is: ".$name;
    });
});