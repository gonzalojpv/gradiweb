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
Route::post('login', 'Api\RegisterController@login');
Route::post('signup', 'Api\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('users', 'Api\UserController');
    Route::resource('cars', 'Api\CarController');
});

Route::resource('search', 'Api\SearchController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
