<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('index');
});

Route::get('index','PostController@index')->name('index');
Route::get('post/form','PostController@addpost')->name('add');
Route::post('store','PostController@store')->name('store');
Route::get('show/details/{id}','PostController@show')->name('show');
Route::get('edit/details/{id}','PostController@edit')->name('edit');
Route::post('post/update/{id}','PostController@update')->name('update');
Route::get('delete/details/{id}','PostController@delete')->name('delete');