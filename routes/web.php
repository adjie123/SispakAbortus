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

// Tabel Gejala
Route::resource('/pages/gejala', 'GejalaController')->middleware('auth');

// Tabel Gejala
Route::resource('/pages/penyakit', 'PenyakitController')->middleware('auth');


// tampilan ya
Route::post('/home/g2', 'HomeController@postG2')->name('post.g2');
Route::post('/home/g6', 'HomeController@postG6')->name('post.g6');
Route::post('/home/g4', 'HomeController@postG4')->name('post.g4');
Route::post('/home/g8', 'HomeController@postG8')->name('post.g8');
Route::post('/home/g1', 'HomeController@postG1')->name('post.g1');

Route::post('/home/g5', 'HomeController@postG5')->name('post.g5');
// Route::post('/home/g3', 'HomeController@postG3')->name('post.g3');
// Route::post('/home/g56', 'HomeController@postG56')->name('post.g56');
// Route::post('/home/g5', 'HomeController@postG5')->name('post.g5');
// Route::post('/home/g6', 'HomeController@postG6')->name('post.g6');
// Route::post('/home/g78', 'HomeController@postG78')->name('post.g78');
// Route::post('/home/g9', 'HomeController@postG9')->name('post.g9');
// Route::post('/home/g10', 'HomeController@postG10')->name('post.g10');
//
// Route::post('pages/hipotesa', 'YaController@postGejala')->name('post.gejala');
//
// // Tampilan Tidak
// Route::get('pages/tidak', 'TidakController@index')->name('pages.tidak');
