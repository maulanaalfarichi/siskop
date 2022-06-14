<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('divisions', function(Blueprint $table)
		{
			$table->string('id',4);
			$table->string('division_name',60);
			$table->timestamps();
			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('divisions', function(Blueprint $table)
		{
			Schema::drop('divisions');
		});
	}

}
