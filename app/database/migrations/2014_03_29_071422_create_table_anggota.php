<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnggota extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_anggotas', function(Blueprint $table)
		{
			$table->string('id',255);
			$table->primary('id');
			$table->string('nama_anggota',255);
			$table->string('jk',10);
			$table->string('tempat_lahir',255);
			$table->date('tanggal_lahir');
			$table->string('alamat',255);
			$table->string('hp',15);
			$table->string('no_identitas',255);
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
		Schema::table('usp_anggotas', function(Blueprint $table)
		{
			Schema::drop('usp_anggotas');
		});
	}

}
