<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\gate;

Route::get('/', function () {
    return view('home');
});

Route::resource('/role', 'RoleController')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/workplans', 'WorkplanController')->middleware('auth');
Route::get('/login', 'HomeController@login')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dany_cerebral', 'HomeController@dany_cerebral')->name('dany_cerebral');
Route::get('/qui_som', 'HomeController@qui_som')->name('qui_som');
Route::get('/equip', 'HomeController@equip')->name('equip');

Auth::routes();

// User routes
Route::get('/usuaris', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/team', 'UserController@team')->name('team')->middleware('auth');
Route::get('/workplans', 'UserController@workplans')->name('workplans')->middleware('auth');
Route::resource('/user', 'UserController')->names('user')->middleware('auth');
Route::get('user/{id}/show/','UserController@show')->middleware('auth');
Route::get('user/{id}/edit/','UserController@edit')->middleware('auth');
Route::get('user/{id}/create/','UserController@create')->middleware('auth');
Route::get('user/{id}/destroy/','UserController@destroy')->middleware('auth');

// Activity routes
Route::resource('/activity', 'ActivityController')->names('activity')->middleware('auth');
Route::get('/activitats', 'ActivityController@index')->name('activity.index')->middleware('auth');
Route::get('activity/{id}/edit/','ActivityController@edit')->middleware('auth');

// Category routes
Route::resource('/category', 'CategoryController')->names('category')->middleware('auth');
Route::get('/categories', 'CategoryController@index')->name('category.index')->middleware('auth');
Route::get('category/{id}/edit/','CategoryController@edit')->middleware('auth');

// PROVISIONAL - PRUEBA EVENTOS
Route::resource('/eventos', 'EventoController')->middleware('auth');