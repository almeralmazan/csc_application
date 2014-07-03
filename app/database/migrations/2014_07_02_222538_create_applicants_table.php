<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('applicants', function($table)
        {
            $table->increments('id');
            $table->boolean('applicant_status')->default(0);
            $table->boolean('paid_status')->default(0);

            // Applicant Name
            $table->string('applicant_last_name', 50)->nullable(false);
            $table->string('applicant_first_name', 50)->nullable(false);
            $table->string('applicant_middle_name', 50)->nullable(false);
            $table->string('applicant_suffix', 50)->default('');

            // Facts of Birth
            $table->string('gender', 10)->nullable(false);
            $table->date('date_of_birth')->nullable(false);
            $table->string('place_of_birth', 50)->nullable(false);
            $table->string('maiden_last_name', 50)->nullable(false);
            $table->string('maiden_first_name', 50)->nullable(false);
            $table->string('maiden_middle_name', 50)->nullable(false);

            // Current Demographic Data
            $table->string('address', 150)->nullable(false);
            $table->string('citizenship', 20)->nullable(false);
            $table->string('civil_status', 20)->nullable(false);
            $table->string('mobile_number', 20)->nullable(false);
            $table->string('phone_number', 20)->default('');
            $table->string('email', 100)->nullable(false);

            // Exam Information
            $table->string('csid_no', 15)->default('');
            $table->string('new_exam_mode')->default('');
            $table->string('new_exam_level')->default('');
            $table->string('testing_centers_location')->nullable(false);
            $table->date('schedule_date_start');
            $table->date('schedule_date_end');
            $table->time('schedule_time_start');
            $table->time('schedule_time_end');
            $table->string('previous_exam_level', 20);
            $table->date('previous_date_exam_taken');

            // Requirements
            $table->string('applicant_picture', 50);
            $table->string('requirement_type_1', 25);
            $table->string('requirement_image_1', 50);
            $table->string('requirement_type_2', 25);
            $table->string('requirement_image_2', 50);

            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('applicants');
	}

}
