<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
   Route::get('/', 'MainController@index')->name('admin.index');
   Route::resource('/categories', 'CategoryController');
   Route::resource('/tags', 'TagController');
   Route::resource('/products', 'AdminProductController');
});

Route::get('/register', 'UserController@create')->name('register.create');
Route::post('/register', 'UserController@store')->name('register.store');

Route::get('/', function () {
    return view('welcome');
})->name('home');
