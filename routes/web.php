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


Route::group(['middleware'=>'login'], function()
{
    Route::get('logout', 'UserController@logout');
});


Route::group(['middleware'=>'logout'], function()
{    
    Route::get('register', 'UserController@showRegisterForm');
    Route::post('register', 'UserController@storeUser');

    Route::get('login', 'UserController@showLoginForm');
    Route::post('login', 'UserController@login');
});

Route::get('showToken', 'UserController@showToken');
