<?php

// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
Route::get('payment', 'HomeController@payment');

Route::get('admin/login', 'AdminController@loginPage');

// Processor Pages



// Admin Pages
Route::group(['before' => 'auth|admin', 'prefix' => 'admin'], function() {
});

