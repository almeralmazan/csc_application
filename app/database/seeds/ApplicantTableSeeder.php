<?php

class ApplicantTableSeeder extends Seeder {

    public function run()
    {
        DB::table('applicants')->delete();

        Applicant::create([

            'applicant_status'          =>  0,
            'paid_status'               =>  0,
            'exam_result'               =>  0,

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
            'csid_no'                   => '10001-1',
            'new_exam_mode'             => 'ppt',
            'new_exam_level'            => 'subpro',
            'testing_centers_location'  => 'Bayombong',
            'schedule_date_start'       => '2014-07-10',
            'schedule_time_start'       => '08:00:00',
            'schedule_time_end'         => '10:00:00',
            'previous_exam_level'       => 'previous_subpro',
            'previous_date_exam_taken'  => '2012-07-01',

            // Requirements
            'applicant_picture'         => 'my_pic.jpg',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_image.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_image.jpg'
        ]);


//        Applicant::create([
//            'applicant_status'          =>  0,
//            'paid_status'               =>  0,
//            'exam_result'               =>  0,
//
//            // Applicant Name
//            'applicant_last_name'       => 'Bar',
//            'applicant_first_name'      => 'Foo',
//            'applicant_middle_name'     => 'Baz',
//            'applicant_suffix'          => '',
//
//            // Facts of Birth
//            'gender'                    => 'Male',
//            'date_of_birth'             => '1993-02-21',
//            'place_of_birth'            => 'Sampaloc, Metro Manila',
//            'maiden_last_name'          => 'Dela Pena',
//            'maiden_first_name'         => 'Cristine',
//            'maiden_middle_name'        => 'Mayon',
//
//            // Current Demographic Data
//            'address'                   => 'Marilao, Bulacan',
//            'citizenship'               => 'Filipino',
//            'civil_status'              => 'Single',
//            'mobile_number'             => '+639155528888',
//            'phone_number'              => '',
//            'email'                     => 'cristine@gmail.com',
//
//            // Exam Information
//            'csid_no'                   => '10001-2',
//            'new_exam_mode'             => 'ppt',
//            'new_exam_level'            => 'subpro',
//            'testing_centers_location'  => 'Bayombong',
//            'schedule_date_start'       => '2014-07-10',
//            'schedule_time_start'       => '08:00:00',
//            'schedule_time_end'         => '10:00:00',
//            'previous_exam_level'       => 'previous_subpro',
//            'previous_date_exam_taken'  => '2012-07-01',
//
//            // Requirements
//            'applicant_picture'         => 'my_pic.jpg',
//            'requirement_type_1'        => 'BIR ID',
//            'requirement_image_1'       => 'bir_id_image.jpg',
//            'requirement_type_2'        => 'SSS ID',
//            'requirement_image_2'       => 'sss_id_image.jpg'
//        ]);
//
//        Applicant::create([
//
//            'control_number'            =>  '000000-1',
//            'applicant_status'          =>  0,
//            'paid_status'               =>  0,
//            'exam_result'               =>  0,
//
//            // Applicant Name
//            'applicant_last_name'       => 'Doe',
//            'applicant_first_name'      => 'John',
//            'applicant_middle_name'     => 'Foo',
//            'applicant_suffix'          => '',
//
//            // Facts of Birth
//            'gender'                    => 'Male',
//            'date_of_birth'             => '1991-01-01',
//            'place_of_birth'            => 'Metro Manila',
//            'maiden_last_name'          => 'Snickers',
//            'maiden_first_name'         => 'Mary',
//            'maiden_middle_name'        => 'The',
//
//            // Current Demographic Data
//            'address'                   => 'New York Cubao',
//            'citizenship'               => 'Filipino',
//            'civil_status'              => 'Single',
//            'mobile_number'             => '+639151528989',
//            'phone_number'              => '',
//            'email'                     => 'omg@gmail.com',
//
//            // Exam Information
//            'csid_no'                   => '10001-1',
//            'new_exam_mode'             => 'ppt',
//            'new_exam_level'            => 'subpro',
//            'testing_centers_location'  => 'Bayombong',
//            'schedule_date_start'       => '2014-07-10',
//            'schedule_time_start'       => '08:00:00',
//            'schedule_time_end'         => '10:00:00',
//            'previous_exam_level'       => 'previous_subpro',
//            'previous_date_exam_taken'  => '2012-07-01',
//
//            // Requirements
//            'applicant_picture'         => 'my_pic.jpg',
//            'requirement_type_1'        => 'BIR ID',
//            'requirement_image_1'       => 'bir_id_image.jpg',
//            'requirement_type_2'        => 'SSS ID',
//            'requirement_image_2'       => 'sss_id_image.jpg'
//        ]);
//
//        Applicant::create([
//
//            'control_number'            =>  '000000-1',
//            'applicant_status'          =>  0,
//            'paid_status'               =>  0,
//            'exam_result'               =>  0,
//
//            // Applicant Name
//            'applicant_last_name'       => 'Doe',
//            'applicant_first_name'      => 'John',
//            'applicant_middle_name'     => 'Foo',
//            'applicant_suffix'          => '',
//
//            // Facts of Birth
//            'gender'                    => 'Male',
//            'date_of_birth'             => '1991-01-01',
//            'place_of_birth'            => 'Metro Manila',
//            'maiden_last_name'          => 'Snickers',
//            'maiden_first_name'         => 'Mary',
//            'maiden_middle_name'        => 'The',
//
//            // Current Demographic Data
//            'address'                   => 'New York Cubao',
//            'citizenship'               => 'Filipino',
//            'civil_status'              => 'Single',
//            'mobile_number'             => '+639151528989',
//            'phone_number'              => '',
//            'email'                     => 'omg@gmail.com',
//
//            // Exam Information
//            'csid_no'                   => '10001-1',
//            'new_exam_mode'             => 'ppt',
//            'new_exam_level'            => 'subpro',
//            'testing_centers_location'  => 'Bayombong',
//            'schedule_date_start'       => '2014-07-10',
//            'schedule_time_start'       => '08:00:00',
//            'schedule_time_end'         => '10:00:00',
//            'previous_exam_level'       => 'previous_subpro',
//            'previous_date_exam_taken'  => '2012-07-01',
//
//            // Requirements
//            'applicant_picture'         => 'my_pic.jpg',
//            'requirement_type_1'        => 'BIR ID',
//            'requirement_image_1'       => 'bir_id_image.jpg',
//            'requirement_type_2'        => 'SSS ID',
//            'requirement_image_2'       => 'sss_id_image.jpg'
//        ]);
//
//        Applicant::create([
//
//            'control_number'            =>  '000000-1',
//            'applicant_status'          =>  0,
//            'paid_status'               =>  0,
//            'exam_result'               =>  0,
//
//            // Applicant Name
//            'applicant_last_name'       => 'Doe',
//            'applicant_first_name'      => 'John',
//            'applicant_middle_name'     => 'Foo',
//            'applicant_suffix'          => '',
//
//            // Facts of Birth
//            'gender'                    => 'Male',
//            'date_of_birth'             => '1991-01-01',
//            'place_of_birth'            => 'Metro Manila',
//            'maiden_last_name'          => 'Snickers',
//            'maiden_first_name'         => 'Mary',
//            'maiden_middle_name'        => 'The',
//
//            // Current Demographic Data
//            'address'                   => 'New York Cubao',
//            'citizenship'               => 'Filipino',
//            'civil_status'              => 'Single',
//            'mobile_number'             => '+639151528989',
//            'phone_number'              => '',
//            'email'                     => 'omg@gmail.com',
//
//            // Exam Information
//            'csid_no'                   => '10001-1',
//            'new_exam_mode'             => 'ppt',
//            'new_exam_level'            => 'subpro',
//            'testing_centers_location'  => 'Bayombong',
//            'schedule_date_start'       => '2014-07-10',
//            'schedule_time_start'       => '08:00:00',
//            'schedule_time_end'         => '10:00:00',
//            'previous_exam_level'       => 'previous_subpro',
//            'previous_date_exam_taken'  => '2012-07-01',
//
//            // Requirements
//            'applicant_picture'         => 'my_pic.jpg',
//            'requirement_type_1'        => 'BIR ID',
//            'requirement_image_1'       => 'bir_id_image.jpg',
//            'requirement_type_2'        => 'SSS ID',
//            'requirement_image_2'       => 'sss_id_image.jpg'
//        ]);
//
//        Applicant::create([
//
//            'control_number'            =>  '000000-1',
//            'applicant_status'          =>  0,
//            'paid_status'               =>  0,
//            'exam_result'               =>  0,
//
//            // Applicant Name
//            'applicant_last_name'       => 'Doe',
//            'applicant_first_name'      => 'John',
//            'applicant_middle_name'     => 'Foo',
//            'applicant_suffix'          => '',
//
//            // Facts of Birth
//            'gender'                    => 'Male',
//            'date_of_birth'             => '1991-01-01',
//            'place_of_birth'            => 'Metro Manila',
//            'maiden_last_name'          => 'Snickers',
//            'maiden_first_name'         => 'Mary',
//            'maiden_middle_name'        => 'The',
//
//            // Current Demographic Data
//            'address'                   => 'New York Cubao',
//            'citizenship'               => 'Filipino',
//            'civil_status'              => 'Single',
//            'mobile_number'             => '+639151528989',
//            'phone_number'              => '',
//            'email'                     => 'omg@gmail.com',
//
//            // Exam Information
//            'csid_no'                   => '10001-1',
//            'new_exam_mode'             => 'ppt',
//            'new_exam_level'            => 'subpro',
//            'testing_centers_location'  => 'Bayombong',
//            'schedule_date_start'       => '2014-07-10',
//            'schedule_time_start'       => '08:00:00',
//            'schedule_time_end'         => '10:00:00',
//            'previous_exam_level'       => 'previous_subpro',
//            'previous_date_exam_taken'  => '2012-07-01',
//
//            // Requirements
//            'applicant_picture'         => 'my_pic.jpg',
//            'requirement_type_1'        => 'BIR ID',
//            'requirement_image_1'       => 'bir_id_image.jpg',
//            'requirement_type_2'        => 'SSS ID',
//            'requirement_image_2'       => 'sss_id_image.jpg'
//        ]);
    }
}