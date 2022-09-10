<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function (){
   Route::get('/', 'MainController@index')->name('admin.index');
   Route::resource('/categories', 'CategoryController');
   Route::resource('/tags', 'TagController');
   Route::resource('/products', 'AdminProductController');
});

Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', 'UserController@create')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shop', 'ProductController@index')->name('shop');
Route::get('/product/{slug}', 'ProductController@show')->name('products.single');

Route::get('/category/{slug}', 'CategoryController@show')->name('category.single');
Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');
