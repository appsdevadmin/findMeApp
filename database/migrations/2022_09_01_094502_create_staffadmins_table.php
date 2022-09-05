<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class staffAdmins extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffAdmins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_no');
			$table->string('name', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('access');
			$table->integer('role');
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
		Schema::drop('staffAdmins');
	}

}
