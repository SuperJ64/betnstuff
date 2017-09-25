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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/create', function () {
    return view('create');
})->name('create.game');
Route::post('/create', 'HomeController@create')->name('new.game');







Route::get('/logout', function () {
   Auth::logout();
   return redirect('/');
});