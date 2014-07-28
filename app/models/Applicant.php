<?php

class Applicant extends Eloquent {

    public static $messages = [
        'applicant_last_name.required'      =>  'Last name is required',
        'applicant_first_name.required'     =>  'First name is required',
        'applicant_middle_name.required'    =>  'Middle name is required',
        'date_of_birth.required'            =>  'Date of birth is required',
        'place_of_birth.not_in'             =>  'You must select your place of birth',
        'maiden_last_name.required'         =>  'Required *',
        'maiden_first_name.required'        =>  'Required *',
        'maiden_middle_name.required'       =>  'Required *',
        'new_exam_mode.not_in'              =>  'Required *',
        'new_exam_level.not_in'             =>  'Required *',
        'testing_centers_location.not_in'   =>  'Choose Testing Center location',
        'schedule_date_start.required'      =>  'Required *',
        'schedule_time_start.required'      =>  'Required *',
        'schedule_time_end.required'        =>  'Required *',
        'picture_photo.image'               =>  'Accept only jpeg, jpg, png images',
        'requirement_type_1.not_in'         =>  'Select a type *',
        'first_requirement_image.image'     =>  'Required *',
        'requirement_type_2.not_in'         =>  'Select a type *',
        'second_requirement_image.image'    =>  'Required *',
    ];

    public static $rules = [
        'applicant_last_name'       =>  'required',
        'applicant_first_name'      =>  'required',
        'applicant_middle_name'     =>  'required',
        'date_of_birth'             =>  'required',
        'place_of_birth'            =>  'not_in:empty',
        'cities_and_provinces'      =>  'not_in:empty',
        'new_exam_mode'             =>  'not_in:empty',
        'new_exam_level'            =>  'not_in:empty',
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

    // Workaround for auto incrementing value for control number with leading zeros
    public static function getNextAutoIncrementValue()
    {
        $result = DB::select('SELECT AUTO_INCREMENT as number
                              FROM INFORMATION_SCHEMA.TABLES
                              WHERE TABLE_SCHEMA = ?
                              AND TABLE_NAME = ?',
                              ['csc_application_db', 'applicants']);

        return $result;
    }

    public static function getPaidStatus($status)
    {
        $result = DB::table('applicants')
                    ->where('paid_status', $status)
                    ->select('id',
                            'controlno',
                            'applicant_last_name',
                            'applicant_first_name',
                            'schedule_date_start'
                    )->get();

        return $result;
    }

    public static function getApplicantStatus($controlNumber)
    {
        $result = DB::table('applicants')
                    ->where('controlno', '=', $controlNumber)
                    ->select(
                        'exam_status',
                        'paid_status',
                        'applicant_last_name',
                        'applicant_first_name',
                        'schedule_date_start'
                    )
                    ->get();

        return $result;
    }

    public static function getAllAvailableSchedules($locationId)
    {
        $result = DB::table('schedules')
                    ->join('testing_centers', 'schedules.testing_center_id', '=', 'testing_centers.id')
                    ->where('testing_centers.id', $locationId)
                    ->select(
                        'testing_centers.location',
                        'schedules.id',
                        'schedules.date_start',
                        'schedules.time_start',
                        'schedules.time_end'
                    )
                    ->get();

        return $result;
    }

    public static function getAllPassedApplicants()
    {
        $result =  DB::table('applicants')
                    ->where('exam_status', 1)
                    ->select(
                        'id',
                        'controlno',
                        'applicant_last_name',
                        'applicant_first_name',
                        'schedule_date_start',
                        'new_exam_level'
                    )->get();

        return $result;
    }

    public function getControlnoAttribute($value)
    {
        return str_pad($value, 7, '0', STR_PAD_LEFT);
    }
}