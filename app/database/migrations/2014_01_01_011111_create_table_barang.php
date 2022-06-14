<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_barang', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('nama_barang');
			$table->decimal('stok');
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
		Schema::table('trx_barang', function(Blueprint $table)
		{
			Schema::drop('trx_barang');
		});
	}

}
