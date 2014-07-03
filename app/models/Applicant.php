<?php

class Applicant extends Eloquent {

    protected $fillable = [
        'applicant_status',
        'paid_status',

        // Applicants Info
        'applicant_last_name',
        'applicant_first_name',
        'applicant_middle_name',
        'applicant_suffix',

        // Facts of Birth
        'gender',
        'date_of_birth',
        'place_of_birth',
        'maiden_last_name',
        'maiden_first_name',
        'maiden_middle_name',

        // Current Demographic Data
        'address',
        'citizenship',
        'civil_status',
        'mobile_number',
        'phone_number',
        'email',

        // Exam Information
        'csid_no',
        'new_exam_mode',
        'new_exam_level',
        'testing_centers_location',
        'schedule_date_start',
        'schedule_date_end',
        'schedule_time_start',
        'schedule_time_end',
        'previous_exam_level',
        'previous_date_exam_taken',

        // Requirements
        'upload_id_picture',
        'requirement_type_1',
        'requirement_image_1',
        'requirement_type_2',
        'requirement_image_2'
    ];
}