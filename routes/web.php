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
Route::get('/tentang', 'TentangController@index')->name('tentang');
Route::get('/program-studi', 'ProgramStudiController@index')->name('program-studi');

Auth::routes([
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    //dosen
    Route::resource('dosen', 'DosenController');
    //kelas
    Route::resource('kelas', 'KelasController');
    //mahasiswa
    Route::resource('mahasiswa', 'MahasiswaController');
    //user
    Route::resource('user', 'UserController');
    Route::get('/update-status/{id}', 'UserController@update_status');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});
