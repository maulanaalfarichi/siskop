<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenjualanHeader extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trx_penjualan', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->date('tanggal_penjualan');
			$table->integer('id_pelanggan');
			$table->foreign('id_pelanggan')->reference('id')->on('trx_pelanggan')
			->onDelete('cascade')->onUpdate('cascade');
			$table->integer('id_ekspedisi');
			$table->foreign('id_ekspedisi')->reference('id')->on('trx_ekspedisis')
			->onDelete('cascade')->onUpdate('cascade');
			$table->decimal('jumlah',18);
			$table->decimal('diskon',18);
			$table->decimal('ongkos_kirim',18);
			$table->decimal('total',18);
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
		Schema::table('trx_penjualan', function(Blueprint $table)
		{
			Schema::drop('trx_penjualan');
		});
	}

}
