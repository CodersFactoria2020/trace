<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\gate;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/role', 'RoleController')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');

Auth::routes();

// User routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/usuaris', 'UserController@index')->name('user.index');
Route::resource('/user', 'UserController')->names('user')->middleware('auth');
Route::get('user/{id}/show/','UserController@show');
Route::get('user/{id}/edit/','UserController@edit');
Route::get('user/{id}/create/','UserController@create');
Route::get('user/{id}/destroy/','UserController@destroy');

// Activity routes
Route::resource('/activity', 'ActivityController')->names('activity')->middleware('auth');
Route::get('/activitats', 'ActivityController@index')->name('activity.index');
Route::get('activity/{id}/edit/','ActivityController@edit');