<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_sales', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('nama_sales',255);
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
		Schema::table('trx_sales', function(Blueprint $table)
		{
			Schema::drop('trx_sales');
		});
	}

}
