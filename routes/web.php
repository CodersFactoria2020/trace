<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\gate;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/role', 'RoleController')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
