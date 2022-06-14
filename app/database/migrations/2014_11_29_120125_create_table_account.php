<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccount extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table)
		{
			$table->string('id',10);
			$table->string('account_name',60);
			$table->string('created_by',60);
			$table->string('grade',1);
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
		Schema::table('accounts', function(Blueprint $table)
		{
			Schema::drop('accounts');
		});
	}

}
