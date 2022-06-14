<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenjualanDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_penjualan_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('id_penjualan',255);
			$table->foreign('id_penjualan')->reference('id')->on('trx_penjualan')
			->onDelete('restrict')->onUpdate('restrict');
			$table->string('id_barang',4);
			$table->foreign('id_barang')->reference('id')->on('trx_barang')
			->onDelete('restrict')->onUpdate('restrict');
			$table->decimal('qty',18);
			$table->string('satuan',255);
			$table->decimal('harga',18);
			$table->decimal('jumlah',18);
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
		Schema::table('trx_penjualan_detail', function(Blueprint $table)
		{
			Schema::drop('trx_penjualan_detail');
		});
	}

}
