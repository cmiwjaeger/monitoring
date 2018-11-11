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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/',function(){
    return view('admin.index');
});
Route::group(['prefix'=>'product','as'=>'product.'], function(){
    Route::get('/', ['as' => 'index', function(){ return view('admin.index'); }]);
    Route::get('product', function(){ return view('admin.product'); });
});
