<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubaccount extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subaccounts', function(Blueprint $table)
		{
			$table->string('id',1);
			$table->string('subaccount_name',60);
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
		Schema::table('subaccounts', function(Blueprint $table)
		{
			Schema::drop('subaccounts');
		});
	}

}
