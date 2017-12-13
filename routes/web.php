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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', array('as'=>'anasayfa', 'uses'=>'WelcomeController@index'));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/problem-ekle', array('as'=>'problem-ekle', 'uses'=>'ProblemController@index'));
Route::post('/problem-ekle', array('as'=>'problem-kaydet', 'uses'=>'ProblemController@store'));
Route::get('/yonetim', array('as'=>'yonetim', 'uses'=>'AdminController@index'));
Route::get('/kullanici-ekle', array('as'=>'kullanici-ekle', 'uses'=>'AdminController@create'));
Route::get('/kullanici-listesi', array('as'=>'kullanici-listesi', 'uses'=>'AdminController@userList'));
Route::get('/problem-listesi', array('as'=>'problem-listesi', 'uses'=>'AdminController@problemList'));
Route::post('/kullanici-ekle', array('as'=>'kullanici-ekle-post', 'uses'=>'AdminController@store'));
Route::get('/hakem', array('as'=>'hakem', 'uses'=>'HakemController@index'));
Route::get('/onay', array('as'=>'onay', 'uses'=>'HakemController@problemList'));
Route::post('/onay', array('as'=>'onayla', 'uses'=>'HakemController@onayla'));