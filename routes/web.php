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

Route::get('/', 'WebController@index');
Route::get('/read/{slug}', 'WebController@detailArticle')->name('read');

Route::group(['middleware' => ['web']], function () {
    Route::resource('category', 'CategoryController');
    Route::resource('article', 'ArticleController');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/update', 'ProfileController@update')->name('profile.update');
});

Route::resource('user', 'UsersController')->middleware('admin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
