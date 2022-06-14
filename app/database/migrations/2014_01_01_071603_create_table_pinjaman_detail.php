<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePinjamanDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_pinjaman_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_pinjam');
			$table->foreign('id_pinjam')->references('id')->on('usp_pinjaman_header')
			->onDelete('cascade');
			$table->integer('cicilan_ke');
			$table->decimal('angsuran_pokok',18);
			$table->decimal('perkiraan_bagi_hasil',18);
			$table->decimal('total_angsuran',18);
			$table->decimal('sisa_pembiayaan',18);
			$table->date('tanggal_bayar');
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
		Schema::table('usp_pinjaman_details', function(Blueprint $table)
		{
			Schema::drop('usp_pinjaman_details');
		});
	}

}
