<?php

class Applicant extends Eloquent {

    public static $rules = [
        'applicant_last_name'       =>  'required',
        'applicant_first_name'      =>  'required',
        'applicant_middle_name'     =>  'required',
        'date_of_birth'             =>  'required',
        'place_of_birth'            =>  'not_in:empty',
        'cities_and_provinces'      =>  'not_in:empty',
        'maiden_last_name'          =>  'required',
        'maiden_first_name'         =>  'required',
        'maiden_middle_name'        =>  'required',
        'address'                   =>  'required',
        'mobile_number'             =>  'required|regex:/^(09)([0-9]{9})$/',
        'email'                     =>  'required|email|unique:applicants',
        'testing_centers_location'  =>  'not_in:empty',
        'schedule_date_start'       =>  'required',
        'schedule_time_start'       =>  'required',
        'schedule_time_end'         =>  'required',
        'picture_photo'             =>  'image|mimes:jpeg,jpg,png',
        'requirement_type_1'        =>  'not_in:empty',
        'first_requirement_image'   =>  'image|mimes:jpeg,jpg,png',
        'requirement_type_2'        =>  'not_in:empty',
        'second_requirement_image'  =>  'image|mimes:jpeg,jpg,png',
    ];

    protected $guarded = [];

    public function getControlnoAttribute($value)
    {
        return str_pad($value, 7, '0', STR_PAD_LEFT);
    }
}