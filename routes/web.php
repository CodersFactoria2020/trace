<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\gate;

Route::get('/', function () {
    return view('home');
});
Route::view('/legal', 'legal');

Route::resource('/role', 'RoleController')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/workplans', 'WorkplanController')->middleware('auth');
Route::get('/login', 'HomeController@login')->name('login');

// Front-visitor routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dany_cerebral', 'HomeController@dany_cerebral')->name('dany_cerebral');
Route::get('/qui_som', 'HomeController@qui_som')->name('qui_som');
Route::get('/equip', 'HomeController@equip')->name('equip');
Route::get('/contacte', 'HomeController@contacte')->name('contacte');
Route::get('/transparencia', 'HomeController@transparencia')->name('transparencia');
Route::get('/recursos', 'HomeController@recursos')->name('recursos');
Route::get('/collaboradors', 'HomeController@collaboradors')->name('collaboradors');
Route::get('/filosofia', 'HomeController@filosofia')->name('filosofia');
Route::get('/collabora', 'HomeController@collabora')->name('collabora');

Auth::routes(['register'=>false, 'reset'=>false, 'verify'=>false]);

Route::resource('team','TeamController')->middleware('auth');

// User routes
Route::get('/usuaris', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard')->middleware('auth');
//Route::get('/team', 'UserController@team')->name('team')->middleware('auth');
Route::get('/workplans', 'UserController@workplans')->name('workplans')->middleware('auth');
Route::resource('/user', 'UserController')->names('user')->middleware('auth');
Route::get('user/{id}/show/','UserController@show')->middleware('auth');
Route::get('user/{id}/edit/','UserController@edit')->middleware('auth');
Route::get('user/{id}/create/','UserController@create')->middleware('auth');
Route::get('user/{id}/destroy/','UserController@destroy')->middleware('auth');

// Activity routes
Route::resource('/activity', 'ActivityController')->names('activity')->middleware('auth');

Route::get('/activity/{activity}/download', 'ActivityController@download')->name('download-document');
Route::get('/activitats', 'ActivityController@index')->name('activity.index')->middleware('auth');
Route::get('activity/{id}/edit/','ActivityController@edit')->middleware('auth');
Route::get('/activity/{activity}/download', 'ActivityController@download')->name('download-document');

// Category routes
Route::resource('/category', 'CategoryController')->names('category')->middleware('auth');
Route::get('/areas', 'CategoryController@index')->name('category.index')->middleware('auth');
Route::get('category/{id}/edit/','CategoryController@edit')->middleware('auth');

// PROVISIONAL - EVENTS SANDBOX
Route::resource('/events', 'EventController')->middleware('auth');


// transparency routes
Route::resource('/transparency', 'TransparencyController')->names('transparency')->middleware('auth');

