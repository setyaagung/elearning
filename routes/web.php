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
Route::get('/kontak', 'KontakController@index')->name('kontak');

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
    //mata kuliah
    Route::resource('matakuliah', 'MataKuliahController');
    //materi
    Route::resource('materi', 'MateriController');
    Route::get('/materi/{id_materi}/detail/create_detail', 'MateriController@create_detail')->name('create_detail');
    Route::post('/materi/detail/store_detail', 'MateriController@store_detail')->name('store_detail');
    Route::get('/materi/{id_materi}/detail/{id}/edit_detail', 'MateriController@edit_detail')->name('edit_detail');
    Route::patch('/materi/{id_materi}/detail/{id}', 'MateriController@update_detail')->name('update_detail');
    Route::delete('/materi/{id_materi}/detail/{id}', 'MateriController@destroy_detail')->name('destroy_detail');
    Route::get('/status/{id}', 'MateriController@status');
    Route::get('/update-status/detail/{id}', 'MateriController@update_status');
    //user
    Route::resource('user', 'UserController');
    Route::get('/update-status/{id}', 'UserController@update_status');
    Route::patch('/reset-password/{id}', 'UserController@reset_password')->name('reset-password');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/courses', 'SiteMateriController@index')->name('semester.courses');
    Route::get('/courses/{id_materi}/detail', 'SiteMateriController@detail_course')->name('detail.courses');
    Route::get('/courses/{id_materi}/detail/{slug}', 'SiteMateriController@course')->name('courses');
});
