<?php

use Illuminate\Support\Facades\Route;

Route::get('/','FrontpageController@home');
Route::post('/orders','OrderController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
