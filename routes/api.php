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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('user','api\UserController');
Route::apiResource('request','api\RequestController');
Route::apiResource('category','api\CategoryController');
Route::apiResource('department','api\DepartmentController');
Route::get('user/request/count/{user}','api\TruongBoPhanController@countOfFromRequest');
Route::get('user/sendRequest/count/{user}','api\UserController@countOfSendRequest');
Route::get('request/infoUser/{request}','api\RequestController@showInfo');


