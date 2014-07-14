<?php

class ApplicantTableSeeder extends Seeder {

    public function run()
    {
        DB::table('applicants')->delete();

        Applicant::create([

            'controlno'                 =>  1,
            'applicant_status'          =>  1,
            'paid_status'               =>  1,
            'exam_status'               =>  0,

            // Applicant Name
            'applicant_last_name'       => 'Doe',
            'applicant_first_name'      => 'John',
            'applicant_middle_name'     => 'Foo',
            'applicant_suffix'          => '',

            // Facts of Birth
            'gender'                    => 'Male',
            'date_of_birth'             => '1991-01-01',
            'place_of_birth'            => 'Metro Manila',
            'maiden_last_name'          => 'Snickers',
            'maiden_first_name'         => 'Mary',
            'maiden_middle_name'        => 'The',

            // Current Demographic Data
            'address'                   => 'New York Cubao',
            'citizenship'               => 'Filipino',
            'civil_status'              => 'Single',
            'mobile_number'             => '+639151528989',
            'phone_number'              => '',
            'email'                     => 'omg@gmail.com',

            // Exam Information
            'csid_no'                   => '',
            'new_exam_mode'             => 'ppt',
            'new_exam_level'            => 'Professional',
            'testing_centers_location_id'  => 6,
            'schedule_date_start'       => '2014-07-10',
            'schedule_time_start'       => '08:00:00',
            'schedule_time_end'         => '10:00:00',
            'previous_exam_level'       => 'previous_subpro',
            'previous_date_exam'        => '2012-07-01',

            // Requirements
            'applicant_picture'         => 'photo.png',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_image.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_image.jpg'
        ]);


    }
}