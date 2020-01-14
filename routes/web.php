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
    $data = [
        'title' => 'Home',
        'css_file' => 'portfolio'
    ];
    return view('home', $data);
});
Route::get('/portfolio', function () {
    $data = [
        'title' => 'Portfolio',
        'css_file' => 'portfolio'
    ];
    return view('portfolio', $data);
});
Route::get('/blog', function () {
    $data = [
        'title' => 'Blog',
        'css_file' => 'portfolio'
    ];
    return view('blog', $data);
});
Route::get('/about', function () {
    $data = [
        'title' => 'About',
        'css_file' => 'portfolio'
    ];
    return view('about', $data);
});
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/detail/{nip}', 'PegawaiController@show');
Route::get('/pegawai/hapus/{nip}', 'PegawaiController@destroy');
Route::post('/pegawai/tambah', 'PegawaiController@store');
Route::put('/pegawai/edit/{nip}', 'PegawaiController@update');
