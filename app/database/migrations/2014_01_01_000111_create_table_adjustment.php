<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdjustment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_adjustment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('tanggal_adjust');
			$table->string('id_barang',4);
			$table->foreign('id_barang')->references('id')->on('trx_barang')
			->onDelete('cascade')->onUpdate('cascade');
			$table->decimal('jml_adjust',18);
			$table->string('keterangan',255);
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
		Schema::table('trx_adjustment', function(Blueprint $table)
		{
			Schema::drop('trx_adjustment');
		});
	}

}
