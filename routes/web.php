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

Auth::routes();

Route::resource('product','ProductController')->middleware('auth');
Route::patch('/product/{id}/value','ProductController@showvalue')->name('value')->middleware('auth'); 
Route::patch('/product/{id}/give','ProductController@updatevalue')->name('updatevalue')->middleware('auth'); 
Route::resource('user','UserController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Privileges/{id}','UserController@password')->name('password')->middleware('auth');
Route::patch('/Privileges/password/{id}','UserController@changePassword')->name('changepassword')->middleware('auth');
Route::get('/Privileges/remove/{id}','UserController@removeAvatar')->name('removeAvatar')->middleware('auth');
Route::patch('/Privileges/avatar/{id}','UserController@updateAvatar')->name('changeavatar')->middleware('auth');
Route::get('/Privileges/avatar/{id}','UserController@avatar')->name('avatar')->middleware('auth');

Route::get('/reports','ReportsController@index')->middleware('auth');
Route::post('/PDFRequest/{filter}','ReportsController@PDFrequest')->name('pdfrequest')->middleware('auth');