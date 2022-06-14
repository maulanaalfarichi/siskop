<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePinjamanHeader extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_pinjaman_header', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('tanggal_pinjam');
			$table->string('id_anggota',255);
			$table->foreign('id_anggota')->references('id')->on('usp_anggotas')
			->onDelete('cascade');
			$table->decimal('pokok_pembiayaan',18);
			$table->decimal('perkiraan_nisbah',18);
			$table->decimal('maksimum_pembiayaan',18);
			$table->integer('jangka_waktu');
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
		Schema::table('usp_pinjaman_header', function(Blueprint $table)
		{
			Schema::drop('usp_pinjaman_header');
		});
	}

}
