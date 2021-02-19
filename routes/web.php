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
Route::get('dropdownlist','DataController@getProvinsi');
Route::get('dropdownlist/getkabupaten/{id}','DataController@getKabupaten');
Route::get('dropdownlist/getkecamatan/{id}','DataController@getKecamatan');
Route::get('dropdownlist/getkelurahan/{id}','DataController@getKelurahan');
Auth::routes();
Route::post('/post-register', 'Auth\RegisterController@postRegister')->name('post-register');
//Register
Route::get('/register','Auth\RegisterController@getProvinsi')->name('register');
Route::get('/register/getkabupaten/{id}','Auth\RegisterController@getKabupaten');
Route::get('/register/getkecamatan/{id}','Auth\RegisterController@getKecamatan');
Route::get('/register/getkelurahan/{id}','Auth\RegisterController@getKelurahan');
//User
Route::get('User/home', 'UserController@index')->name('index');
Route::get('User/home/delete/{id}','UserController@hapus')->name('deleteUser');
Route::get('User/edit/{id}','UserController@edit')->name('editUser');
Route::post('User/update','UserController@update')->name('updateUser');
Route::get('User/edit/getkabupaten/{id}','UserController@getKabupaten');
Route::get('User/edit/getkecamatan/{id}','UserController@getKecamatan');
Route::get('User/edit/getkelurahan/{id}','UserController@getKelurahan');
Route::get('User/show/{id}','UserController@getMessage')->name('showUser');

Route::get('/home', 'HomeController@index')->name('home');
