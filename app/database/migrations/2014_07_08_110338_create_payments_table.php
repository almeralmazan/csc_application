<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('payments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->string('transaction_number', 30)->default('');
            $table->date('reserved_date');
            $table->date('paid_date');
            $table->double('price', 5, 2);
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
        Schema::drop('payments');
	}

}
