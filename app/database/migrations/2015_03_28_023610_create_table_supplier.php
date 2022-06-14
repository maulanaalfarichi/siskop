<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSupplier extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_suppliers', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('nama_supplier',255);
			$table->string('kota',255);
			$table->string('contact',255);
			$table->string('telp',255);
			$table->string('product',255);
			$table->string('email',255);
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
		Schema::table('trx_suppliers', function(Blueprint $table)
		{
			Schema::drop('trx_suppliers');
		});
	}

}
