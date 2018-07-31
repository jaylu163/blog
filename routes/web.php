<?php

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

Route::get('/login','AuthwebController@index');
Route::post('/register', 'AuthwebController@register');
Route::post('/authenticate', 'AuthwebController@login');
Route::get('/logout','AuthwebController@logout');

Route::get('/google','GoogleqcodeController@index');
Route::post('/checkcode','GoogleqcodeController@checCode');
//后台主页
Route::group(['middleware'=>'check-login'], function () {
	Route::get('index/main','IndexController@getInfo');
	Route::group([], function () {//['middleware'=>'check-permisson']
		Route::get('users/add','IndexController@getInfo');
		Route::get('role/add', 'RoleController@add');
		Route::get('role/index', 'RoleController@index');
		Route::get('permission/index', 'PermissionController@index');
		Route::get('user/index', 'UsersController@index');
	});
});

Route::post('user/ajax_get_data', 'UsersController@ajaxGetData');
// token认证
Route::group(['middleware' => 'jwt-auth'], function () {
    Route::post('/user/getuser', 'UsersController@getUserDetails');
    //Route::post('user/ajax_get_data', 'UsersController@ajaxGetData');           
});