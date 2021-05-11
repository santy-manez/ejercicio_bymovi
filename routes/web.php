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

Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
Route::group(['prefix' => 'users'], function () {
    Route::get('create', ['as' => 'users.create', 'uses' => 'UserController@create' ]);
    Route::post('/', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('edit/{user}', ['as' => 'users.edit','uses' => 'UserController@edit']);
    Route::patch('{user}', ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::get('{user}', ['as' => 'users.show','uses' => 'UserController@show']);
    Route::delete('{user}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
});


Route::group(['prefix' => 'roles'], function () {
	Route::get('/', ['as' => 'roles.index', 'uses' => 'RoleController@index']);
    Route::get('create', ['as' => 'roles.create', 'uses' => 'RoleController@create' ]);
    Route::post('/', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
    Route::get('edit/{role}', ['as' => 'roles.edit','uses' => 'RoleController@edit']);
    Route::patch('{role}', ['as' => 'roles.update', 'uses' => 'RoleController@update']);
    Route::get('{role}', ['as' => 'roles.show','uses' => 'RoleController@show']);
    Route::delete('{role}', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy']);
});
