<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSimpanan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_simpanans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('tanggal_simpanan');
			$table->integer('id_anggota');
			$table->foreign('id_anggota')->references('id')->on('usp_anggotas')
			->onDelete('cascade');
			$table->integer('id_jenis');
			$table->foreign('id_jenis')->references('id')->on('usp_jenis_simpan')
			->onDelete('cascade');
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
		Schema::table('usp_simpanans', function(Blueprint $table)
		{
			Schema::drop('usp_simpanans');
		});
	}

}
