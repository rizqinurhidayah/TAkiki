<?php
Route::get('/', function () {
    return redirect('/login');
});
Auth::routes();

Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@PostLogin');

Route::get('/home','HomeController@index');

//data user
Route::get('/user', 'UserController@index');
Route::post('/insert/user', 'UserController@insert_user');
Route::post('/edit/user', 'UserController@edit_user');
Route::get('/hapus/user/{id}', 'UserController@delete_user');

// target
Route::get('/target', 'Datamaster@target');
Route::post('/insert/target', 'Datamaster@insert_target');
Route::post('/edit/target', 'Datamaster@edit_target');
Route::get('/hapus/target/{id}', 'Datamaster@delete_target');

// santri
Route::get('/santri', 'Datamaster@santri');
Route::post('/insert/santri', 'Datamaster@insert_santri');
Route::post('/edit/santri', 'Datamaster@edit_santri');
Route::get('/hapus/santri/{id}', 'Datamaster@delete_santri');

// ortu
Route::get('/ortu', 'Datamaster@ortu');
Route::post('/insert/ortu', 'Datamaster@insert_ortu');
Route::post('/edit/ortu', 'Datamaster@edit_ortu');
Route::get('/hapus/ortu/{id}', 'Datamaster@delete_ortu');

// surah
Route::get('/surah', 'Datamaster@surah');

Route::get('/hafalan', 'HafalanController@index');
Route::get('/hafalan/detail/{id}', 'HafalanController@detail');
Route::POST('/tercapai', 'HafalanController@tercapai');

//akkses ortu
Route::get('/data/santri', 'OrtuController@index');

//laporan
Route::get('/Cetak_PDF/{id}', 'HafalanController@Cetak_PerSantri');

Route::get('/santri/Cetak_PDF', 'HafalanController@Cetak_DataSantri');


Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});