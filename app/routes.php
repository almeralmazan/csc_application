<?php

// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
Route::get('payment', 'HomeController@payment');

Route::get('admin/login', 'AdminController@loginPage');
Route::post('admin/login', 'AdminController@verifyLogin');

Route::get('processor/login', 'ProcessorController@loginPage');
Route::post('processor/login', 'ProcessorController@verifyLogin');

// Processor Pages
Route::group(['before' => 'admin', 'prefix' => 'processor'], function() {
    Route::get('/', 'ProcessorController@index');
    Route::get('logout', 'ProcessorController@logout');
});


// Admin Pages
Route::group(['before' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('logout', 'AdminController@logout');
});

