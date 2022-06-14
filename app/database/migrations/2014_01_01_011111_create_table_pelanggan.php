<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePelanggan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_pelanggan', function(Blueprint $table)
		{
			$table->integer('id');
			$table->primary('id');
			$table->string('nama_pelanggan',255);
			$table->string('Alamat',255);
			$table->string('contact',255);
			$table->string('telp',255);
			$table->string('fax',255);
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
		Schema::table('trx_pelanggan', function(Blueprint $table)
		{
			Schema::drop('trx_pelanggan');
		});
	}

}
