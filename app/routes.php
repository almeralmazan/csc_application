<?php

// Working Live Messaging
//Route::get('test', function()
//{
//    $account_sid = 'AC81e2fe008ee80f5bfebbdf566ba9c5e5';
//    $auth_token = 'd704f52acd7c7db554c1f11aa02377e1';
//    $client = new Services_Twilio($account_sid, $auth_token);
//
//    $client->account->messages->create(array(
//        'To' => "+639236923431",
//        'From' => "+14849976019",
//        'Body' => "hello this is a test from twilio, almer",
//    ));
//});

// Public Pages
Route::get('/', 'HomeController@home');
Route::get('application-form', 'HomeController@applicationForm');
Route::get('list-of-passers', 'HomeController@listOfPassers');
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
    Route::get('delete/user/{userId}', 'AdminController@deleteUser');
    Route::post('add/schedule', 'AdminController@addSchedule');
    Route::get('delete/schedule/{scheduleId}/test-center/{testingCenterId}', 'AdminController@deleteSchedule');

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

