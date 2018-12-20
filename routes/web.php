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

Route::get('homepage', 'loginController@successLogin');
Route::get('register', 'registerController@getRegister')->name('register');
Route::get('login', 'loginController@getLogin')->name('login');
Route::post('postRegister', 'registerController@postRegister');
Route::post('postLogin', 'loginController@postLogin');
Route::get('logout','loginController@logout')->name('logout');

Route::get('create', 'createController@createPost')->name('create');
Route::post('postBlog', 'createController@sendPost')->name('postBlog');
Route::get('list_post', 'createController@list_post')->name('list_post');
Route::get('/front', function () {
    return view('pages.front');
});
Route::get('/about', function () {
    return view('pages.contact');
});