<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCoa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coas', function(Blueprint $table)
		{
			$table->string('id',11);
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
		Schema::table('coas', function(Blueprint $table)
		{
			Schema::drop('coas');
		});
	}

}
