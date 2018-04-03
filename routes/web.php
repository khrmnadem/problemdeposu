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
Route::get('/problem/{id}', array('as' => 'problem', 'uses'=>'SingleController@index'));

Route::get('/ders-ekle', array('as' => 'ders-ekle', 'uses' => 'CatController@dersForm'));
Route::get('/unite-ekle', array('as' => 'unite-ekle', 'uses' => 'CatController@uniteForm'));
Route::get('/konu-ekle', array('as' => 'konu-ekle', 'uses' => 'CatController@konuForm'));

Route::post('/ders-ekle', array('as' => 'ders-ekle', 'uses' => 'CatController@dersEkle'));
Route::post('/unite-ekle', array('as' => 'unite-ekle', 'uses' => 'CatController@uniteEkle'));
Route::post('/konu-ekle', array('as' => 'konu-ekle', 'uses' => 'CatController@konuEkle'));

Route::get('/duzenle/{id}', array('as' => 'duzenle', 'uses' => 'SingleController@edit'));
Route::post('duzenle/{id}', array('as' => 'guncelle', 'uses' => 'SingleController@update'));

Route::get('/sil/{id}', array('as' => 'sil', 'uses' => 'SingleController@destroy'));

Route::get('/kategori/{id}', array('as'=>'kategori', 'uses'=> 'CatController@show'));