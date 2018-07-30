<?php

use Illuminate\Http\Request;

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

Route::group([],function(){
	Route::get('/login','LoginController@index');

});

Route::group(['middleware' => ['api','cors'] ], function () {
    Route::post('register', 'LoginController@register');
    Route::post('login', 'LoginController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('user/get_user_details', 'UsersController@getUserDetails');
    });
});

