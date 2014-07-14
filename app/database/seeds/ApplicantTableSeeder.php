<?php

class ApplicantTableSeeder extends Seeder {

    public function run()
    {
        DB::table('applicants')->delete();

        // 1
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

        // 2
        Applicant::create([
            'controlno'                 =>  2,
            'applicant_status'          =>  1,
            'paid_status'               =>  1,
            'exam_status'               =>  1,

            // Applicant Name
            'applicant_last_name'       => 'Alvarez',
            'applicant_first_name'      => 'Mario',
            'applicant_middle_name'     => 'P',
            'applicant_suffix'          => '',

            // Facts of Birth
            'gender'                    => 'Male',
            'date_of_birth'             => '1994-05-03',
            'place_of_birth'            => 'Quezon City',
            'maiden_last_name'          => 'Santos',
            'maiden_first_name'         => 'Maria',
            'maiden_middle_name'        => 'Quizon',

            // Current Demographic Data
            'address'                   => 'B10 L14 Talanay Area A, Batasan Hills Quezon City',
            'citizenship'               => 'Filipino',
            'civil_status'              => 'Single',
            'mobile_number'             => '+639484917432',
            'phone_number'              => '9610711',
            'email'                     => 'mario3@gmail.com',

            // Exam Information
            'csid_no'                   => '',
            'new_exam_mode'             => 'ppt',
            'new_exam_level'            => 'Sub Pro',
            'testing_centers_location_id'  => 1,
            'schedule_date_start'       => '2014-07-11',
            'schedule_time_start'       => '11:00:00',
            'schedule_time_end'         => '13:00:00',
            'previous_exam_level'       => 'empty',
            'previous_date_exam'        => '0000-00-00',

            // Requirements
            'applicant_picture'         => 'photo2.jpg',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_2.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_2.jpg'
        ]);

        // 3
        Applicant::create([
            'controlno'                 =>  3,
            'applicant_status'          =>  1,
            'paid_status'               =>  0,
            'exam_status'               =>  0,

            // Applicant Name
            'applicant_last_name'       => 'Villanueva',
            'applicant_first_name'      => 'Seizer',
            'applicant_middle_name'     => 'M',
            'applicant_suffix'          => 'Jr.',

            // Facts of Birth
            'gender'                    => 'Male',
            'date_of_birth'             => '1992-02-25',
            'place_of_birth'            => 'Caloocan City',
            'maiden_last_name'          => 'Obispo',
            'maiden_first_name'         => 'Fatima',
            'maiden_middle_name'        => 'Rongcales',

            // Current Demographic Data
            'address'                   => 'B6 L2 Matrix Village Camarin, Caloocan City',
            'citizenship'               => 'Filipino',
            'civil_status'              => 'Married',
            'mobile_number'             => '+639496518240',
            'phone_number'              => '',
            'email'                     => 'seizer011@yahoo.com',

            // Exam Information
            'csid_no'                   => '',
            'new_exam_mode'             => 'cat',
            'new_exam_level'            => 'Sub Pro',
            'testing_centers_location_id'  => 2,
            'schedule_date_start'       => '2014-07-18',
            'schedule_time_start'       => '02:00:00',
            'schedule_time_end'         => '09:00:00',
            'previous_exam_level'       => 'empty',
            'previous_date_exam'        => '0000-00-00',

            // Requirements
            'applicant_picture'         => 'photo3.jpg',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_3.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_3.jpg'
        ]);

        // 4
        Applicant::create([
            'controlno'                 =>  4,
            'applicant_status'          =>  1,
            'paid_status'               =>  1,
            'exam_status'               =>  1,

            // Applicant Name
            'applicant_last_name'       => 'Reyes',
            'applicant_first_name'      => 'Gem',
            'applicant_middle_name'     => 'Sahol',
            'applicant_suffix'          => '',

            // Facts of Birth
            'gender'                    => 'Female',
            'date_of_birth'             => '1994-06-15',
            'place_of_birth'            => 'Manila City',
            'maiden_last_name'          => 'Sahol',
            'maiden_first_name'         => 'Rachel',
            'maiden_middle_name'        => 'Cruz',

            // Current Demographic Data
            'address'                   => 'B10 L10 Chris Village Metro Manila City',
            'citizenship'               => 'Filipino',
            'civil_status'              => 'Single',
            'mobile_number'             => '+639152761778',
            'phone_number'              => '',
            'email'                     => 'gem15@yahoo.com',

            // Exam Information
            'csid_no'                   => '',
            'new_exam_mode'             => 'cat',
            'new_exam_level'            => 'Professional',
            'testing_centers_location_id'  => 4,
            'schedule_date_start'       => '2014-07-31',
            'schedule_time_start'       => '13:00:00',
            'schedule_time_end'         => '15:00:00',
            'previous_exam_level'       => 'empty',
            'previous_date_exam'        => '0000-00-00',

            // Requirements
            'applicant_picture'         => 'photo4.jpg',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_4.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_4.jpg'
        ]);

        // 5
        Applicant::create([
            'controlno'                 =>  5,
            'applicant_status'          =>  1,
            'paid_status'               =>  0,
            'exam_status'               =>  1,

            // Applicant Name
            'applicant_last_name'       => 'Balbuena',
            'applicant_first_name'      => 'Marie',
            'applicant_middle_name'     => 'Benitez',
            'applicant_suffix'          => '',

            // Facts of Birth
            'gender'                    => 'Female',
            'date_of_birth'             => '1991-12-08',
            'place_of_birth'            => 'Baguio City',
            'maiden_last_name'          => 'Benitez',
            'maiden_first_name'         => 'Kim',
            'maiden_middle_name'        => 'Chin',

            // Current Demographic Data
            'address'                   => 'Quinonez Village Baguio City',
            'citizenship'               => 'Filipino',
            'civil_status'              => 'Single',
            'mobile_number'             => '+639126518345',
            'phone_number'              => '',
            'email'                     => 'marie2014@google.com',

            // Exam Information
            'csid_no'                   => '',
            'new_exam_mode'             => 'ppt',
            'new_exam_level'            => 'Sub Pro',
            'testing_centers_location_id'  => 6,
            'schedule_date_start'       => '2014-06-03',
            'schedule_time_start'       => '08:00:00',
            'schedule_time_end'         => '10:00:00',
            'previous_exam_level'       => 'empty',
            'previous_date_exam'        => '0000-00-00',

            // Requirements
            'applicant_picture'         => 'photo5.jpg',
            'requirement_type_1'        => 'BIR ID',
            'requirement_image_1'       => 'bir_id_5.jpg',
            'requirement_type_2'        => 'SSS ID',
            'requirement_image_2'       => 'sss_id_5.jpg'
        ]);
    }
}