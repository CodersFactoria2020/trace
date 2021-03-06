<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'HomeController@login')->name('login');

// Front-visitor routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dany_cerebral', 'HomeController@dany_cerebral')->name('dany_cerebral');
Route::get('/qui_som', 'HomeController@qui_som')->name('qui_som');
Route::get('/equip', 'TeamController@viewVisitor')->name('equip');
Route::get('/contacte', 'HomeController@contacte')->name('contacte');
Route::get('/transparencia', 'TransparencyController@viewVisitor')->name('transparencia');
Route::get('/recursos', 'HomeController@recursos')->name('recursos');
Route::get('/collaboradors', 'HomeController@collaboradors')->name('collaboradors');
Route::get('/filosofia', 'HomeController@filosofia')->name('filosofia');
Route::get('/collabora', 'HomeController@collabora')->name('collabora');
Route::view('/legal', 'legal');

Auth::routes(['register'=>false, 'reset'=>false, 'verify'=>false]);

// User routes
Route::get('/usuaris', 'UserController@index')->name('user.index')->middleware('auth');
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/soci-all-activities', 'UserController@soci_all_activities')->name('soci-all-activities')->middleware('auth');
Route::resource('/user', 'UserController')->middleware('auth');
Route::get('user/{id}/destroy/','UserController@destroy')->middleware('auth');
Route::get('filter','UserController@filter')->name('user.filter')->middleware('auth');

// Activity routes
Route::resource('/activity', 'ActivityController')->names('activity')->middleware('auth');
Route::get('/activity_file/{activity}', 'ActivityController@destroy_file')->name('destroy-file');
Route::get('/activity/{activity}/download', 'ActivityController@download')->name('download-document');
Route::get('/activitats', 'ActivityController@index')->name('activity.index')->middleware('auth');
Route::get('activity/{id}/edit/','ActivityController@edit')->middleware('auth');
Route::get('/activity/{activity}/download', 'ActivityController@download')->name('download-document');

// Category routes
Route::resource('/category', 'CategoryController')->names('category')->middleware('auth');
Route::get('/areas', 'CategoryController@index')->name('category.index')->middleware('auth');
Route::get('category/{id}/edit/','CategoryController@edit')->middleware('auth');

// Transparency routes
Route::resource('/transparency', 'TransparencyController')->names('transparency')->middleware('auth');

// Team routes
Route::resource('team','TeamController')->middleware('auth');
