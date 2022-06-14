<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengambilan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_pengambilan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('tanggal_ambil');
			$table->string('id_anggota',255);
			$table->foreign('id_anggota')->references('id')->on('usp_anggotas')
			->onDelete('cascase');
			$table->decimal('jumlah');
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
		Schema::table('usp_pengambilan', function(Blueprint $table)
		{
			Schema::drop('usp_pengambilan');
		});
	}

}
