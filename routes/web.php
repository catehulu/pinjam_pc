<?php
use Pinjam\Barang;

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

Route::get('/test', function () {
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
    $barangs = Barang::all();
    return view('data.upload2',compact('barangs'));
})->name('data.upload');

Route::patch('/upload_berkas', 'DataController@upload')->name('data.upload');

Route::get('/download/{id}','DataController@generatePDF')->name('data.pdf');

Route::get('/komputer','ControllerKomputer@index')->name('komputer.index');

Route::get('/komputer/status/{id}','ControllerKomputer@readone')->name('komputer.readone');

Route::patch('/pinjam','ControllerKomputer@pinjam')->name('komputer.pinjam');

Route::patch('/kembalikan','ControllerKomputer@kembalikan')->name('komputer.kembalikan');

Route::get('/admin/pilih/{id}','ControllerKomputer@pilih')->name('komputer.pilih');

//Peminjaman barang

Route::get('/barang/admin/create', 'BarangController@create')->name('Barang.create');

Route::get('/barang/admin', 'BarangController@index')->name('Barang.index');

Route::get('/barang/admin/readone/{id}', 'BarangController@readone')->name('Barang.readone');

Route::post('/barang/admin/create', 'BarangController@store')->name('Barang.store');

Route::patch('/barang/admin/{barang}', 'BarangController@update')->name('Barang.update');

Route::get('/barang/delete/{barang}', 'BarangController@destroy')->name('Barang.delete');

Route::get('/barang/admin/{barang}', 'BarangController@edit')->name('Barang.edit');

Route::get('/download/barang/{peminjamBarang}','PeminjamBarangController@generatePDF')->name('peminjam.pdf');

Route::get('/barang/create', 'PeminjamBarangController@create')->name('peminjam.create');

Route::post('/barang/create', 'PeminjamBarangController@store')->name('peminjam.store');

Route::get('/barang/show/{peminjamBarang}', 'PeminjamBarangController@show')->name('peminjam.show');

Route::patch('/barang/update/{peminjamBarang}', 'PeminjamBarangController@update')->name('peminjam.update');

Route::patch('/barang/upload', 'PeminjamBarangController@upload')->name('peminjam.upload');
