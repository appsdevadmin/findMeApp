<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('staff_id');
			$table->string('unique_id', 200)->nullable();
			$table->string('qr_code')->nullable();
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('sex', 25);
			$table->string('dob', 25);
			$table->string('grade_code', 25);
			$table->string('designation');
			$table->string('phone', 25);
			$table->string('mobile', 25);
			$table->string('office', 25);
			$table->string('ext', 25);
			$table->string('email');
			$table->string('home_address');
			$table->string('loc_description');
			$table->string('section_name');
			$table->string('department_name');
			$table->string('division_fullname');
			$table->string('directorate_fullname');
			$table->string('sbu');
			$table->string('category');
			$table->string('last_name');
			$table->string('status', 50);
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff_data');
	}

}
