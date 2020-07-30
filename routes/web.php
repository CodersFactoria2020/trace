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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dany_cerebral', 'HomeController@dany_cerebral')->name('dany_cerebral');
Route::get('/qui_som', 'HomeController@qui_som')->name('qui_som');
Route::get('/equip', 'HomeController@equip')->name('equip');
