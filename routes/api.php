<?php

use Illuminate\Http\Request;
use App\Category;
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

Route::get('category', 'CategoryAPIController@index');
//http://localhost/laravel/rating/public/api/category/21
Route::get('category/{category}', 'CategoryAPIController@show');
//http://localhost/laravel/rating/public/api/category
Route::post('category', 'CategoryAPIController@store');
//http://localhost/laravel/rating/public/api/category/update/21
Route::post('category/update/{category}', 'CategoryAPIController@update');
//http://localhost/laravel/rating/public/api/category/delete/21
Route::delete('category/{category}', 'CategoryAPIController@delete');