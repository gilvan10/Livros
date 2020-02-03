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

Route::get('/bulma', function () {
    return view('testeBulma');
});

Auth::routes();

Route::get('/home', 'Admin\LivroController@index')->name('home');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->
group(function(){
    Route::resource('livros', 'LivroController');
});