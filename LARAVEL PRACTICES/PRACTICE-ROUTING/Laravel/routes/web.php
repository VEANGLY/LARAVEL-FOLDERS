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
// sta
Route::get('/', function () {
    global $users;
    return $users;
});


// GET USER WITH WEB ROUTE
Route::get('/users', function () {
    global $users;
    $data = "";
    foreach ($users as $user) {
        $data .= $user['name'].", ";
    }
    return "The users are: ".$data;
});

