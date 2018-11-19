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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'DataController@create')->name('data.create');

Route::get('/admin', 'DataController@index')->name('data.index')->middleware('auth');

Route::get('/admin/readone/{id}', 'DataController@readone')->name('data.readone')->middleware('auth');

Route::post('/create', 'DataController@store')->name('data.store');

Route::patch('/admin/readone/{id}/update/{stat}', 'DataController@update')->name('data.update')->middleware('auth');

Route::get('/show', 'DataController@show')->name('data.show');

Route::get('/upload_berkas', function () {
    return view('data.upload');
})->name('data.upload');

Route::patch('/upload_berkas', 'DataController@upload')->name('data.upload');

Route::get('/download/{id}','DataController@generatePDF')->name('data.pdf');

Route::get('/komputer','ControllerKomputer@index')->name('komputer.index');

Route::get('/komputer/status/{id}','ControllerKomputer@readone')->name('komputer.readone');

Route::patch('/pinjam','ControllerKomputer@pinjam')->name('komputer.pinjam');

Route::patch('/kembalikan','ControllerKomputer@kembalikan')->name('komputer.kembalikan');