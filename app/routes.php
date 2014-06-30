<?php

// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
Route::get('payment', 'HomeController@payment');
