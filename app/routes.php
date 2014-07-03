<?php

// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
Route::get('payment', 'HomeController@payment');
Route::post('validate-inputs', 'HomeController@validateAllInputs');
Route::get('applicant-success-page', 'HomeController@successPage');

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
    Route::get('list-of-passers', 'AdminController@listOfPassers');
    Route::get('schedules', 'AdminController@schedules');
    Route::get('users', 'AdminController@users');
    Route::get('reports', 'AdminController@reports');
    Route::get('logout', 'AdminController@logout');
});

