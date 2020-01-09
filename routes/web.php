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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/detail/{nip}', 'PegawaiController@show');
Route::get('/pegawai/hapus/{nip}', 'PegawaiController@destroy');
Route::post('/pegawai/tambah', 'PegawaiController@store');
Route::put('/pegawai/edit/{nip}', 'PegawaiController@update');
