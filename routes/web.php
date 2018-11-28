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


Route::get('blog/category/{slug}', 'BlogController@category')->name('category');
Route::get('blog/article/{slug}', 'BlogController@article')->name('article');
Route::get('/', 'BlogController@start')->name('index');



Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'can:access-admin-panel']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/article', 'ArticleController', ['as'=>'admin']);
  Route::group(['prefix'=>'user_managment', 'namespace'=>'UserManagment'], function(){
    Route::resource('/user', 'UserController', ['as' => 'admin.user_managment']);
  });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{name}', 'ProfileController@index')->name('profile');
Route::post('/profile/{user}', 'ProfileController@update_avatar')->name('update_avatar');
