<?php


// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
Route::get('passed-applicants', 'HomeController@getAllPassedApplicants');
Route::get('payment-status', 'HomeController@paymentStatus');
Route::get('payment', 'HomeController@payment');
Route::post('validate-inputs', 'HomeController@validateAllInputs');
Route::get('reserved-page/{applicantId}', 'HomeController@reservedPage');
Route::get('proceed-to-payment', 'HomeController@proceedToPayment');
Route::get('search-control-no/{controlNumber}', 'HomeController@getApplicantStatus');
Route::get('admin/login', 'AdminController@loginPage');
Route::post('admin/login', 'AdminController@verifyLogin');
Route::get('processor/login', 'ProcessorController@loginPage');
Route::post('processor/login', 'ProcessorController@verifyLogin');


// Processor Pages
Route::group(['before' => 'processor', 'prefix' => 'processor'], function() {
    Route::get('/', 'ProcessorController@index');
    Route::get('reserved', 'ProcessorController@reserved');
    Route::get('applicant/{applicantId}', 'ProcessorController@show');
    Route::get('paid-applicants', 'ProcessorController@getAllPaidApplicants');
    Route::get('reserved-applicants', 'ProcessorController@getAllReservedApplicants');
    Route::get('update/applicant/{applicantId}', 'ProcessorController@updatePage');
    Route::post('update/applicant/{applicantId}', 'ProcessorController@updateStatus');
    Route::get('logout', 'ProcessorController@logout');
});


// Admin Pages
Route::group(['before' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('list-of-passers', 'AdminController@listOfPassers');
    Route::get('schedules', 'AdminController@schedules');
    Route::get('users', 'AdminController@users');
    Route::get('reports', 'AdminController@reports');
    Route::get('applicants', 'AdminController@getAllApplicants');
    Route::get('applicant/{applicantId}', 'AdminController@show');
    Route::get('passed-applicants', 'AdminController@getAllPassedApplicants');
    Route::get('logout', 'AdminController@logout');
    Route::get('delete/user/{userId}', 'AdminController@deleteUser');
    Route::post('add/schedule', 'AdminController@addSchedule');
    Route::get('delete/schedule/{scheduleId}/test-center/{testingCenterId}', 'AdminController@deleteSchedule');

    Route::get('filter-results', 'AdminController@filterResults');
    Route::post('validate-add-user', 'AdminController@addUser');
});


// ------------------------
//  Retrieving JSON format
// ------------------------
Route::get('all-users', function()
{
    // returns a json format automatically without toJson() method
    return User::all();
});

// AJAX
Route::get('available-schedules/{locationId}', 'HomeController@allAvailableSchedules');

