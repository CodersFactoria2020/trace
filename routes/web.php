<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/activity', 'ActivityController')->names('activity')->middleware('auth');
Route::get('/activity/{activity}/download', 'ActivityController@download')->name('download-document');
