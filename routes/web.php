<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::middleware('auth')->resource('city','City\CityController')->except(['show']);

Route::middleware('auth')->namespace('Company')->group(function (){
    Route::resource('companies','companyController');
    Route::resource('status','StatusController')->only(['edit','update']);
    Route::resource('range','RangeController')->only(['edit','update']);
    Route::resource('sold','SoldController')->only(['edit','update']);
});