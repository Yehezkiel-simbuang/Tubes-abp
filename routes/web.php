<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontenController;

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
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('detail/{id}', 'App\Http\Controllers\HomeController@detail')->name('detail');
Route::get('wisatadetail/{id}', 'App\Http\Controllers\WisataController@wisatadetail')->name('wisatadetail');
Route::get('budayadetail/{id}', 'App\Http\Controllers\BudayaController@budayadetail')->name('budayadetail');
Route::get('kulinerdetail/{id}', 'App\Http\Controllers\KulinerController@kulinerdetail')->name('kulinerdetail');
Route::get('/wisata', 'App\Http\Controllers\Wisatacontroller@index');
Route::get('/budaya', 'App\Http\Controllers\BudayaController@index');
Route::get('/kuliner', 'App\Http\Controllers\KulinerController@index');
Route::get('/konten', 'App\Http\Controllers\KontenController@index');
Route::get('/saran', 'App\Http\Controllers\SaranController@index');
Route::get('/tambah', 'App\Http\Controllers\AdminController@index');
Route::post('saran', 'App\Http\Controllers\SaranController@create')->name('saran');
Route::post('create', 'App\Http\Controllers\KontenController@create')->name('create');
