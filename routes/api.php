<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/home', 'App\Http\Controllers\API\HomeController@index');
Route::get('budaya', 'App\Http\Controllers\API\BudayaController@index');
Route::get('budaya/delete/{id}', 'App\Http\Controllers\API\BudayaController@destroy');
Route::get('/kuliner', 'App\Http\Controllers\API\KulinerController@index');
Route::get('kuliner/delete/{id}', 'App\Http\Controllers\API\KulinerController@destroy');
Route::get('/saran', 'App\Http\Controllers\API\SaranController@index');
Route::get('saran/delete/{id}', 'App\Http\Controllers\API\KulinerController@destroy');
Route::get('/user', 'App\Http\Controllers\API\UserController@index');
Route::get('user/delete/{id}', 'App\Http\Controllers\API\UserController@destroy');
Route::get('/wisata', 'App\Http\Controllers\API\WisataController@index');
Route::get('wisata/delete/{id}', 'App\Http\Controllers\API\WisataController@destroy');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
