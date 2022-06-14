<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEkspedisi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_ekspedisis', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('nama',255);
			$table->string('alamat',255);
			$table->string('kota',255);
			$table->string('contact',255);
			$table->string('telp',255);
			$table->string('daerah',255);
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
		Schema::table('trx_ekspedisis', function(Blueprint $table)
		{
			Schema::drop('trx_ekspedisis');
		});
	}

}
