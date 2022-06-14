<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKoperasi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_koperasis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_koperasi',255);
			$table->string('alamat',255);
			$table->string('telp',20);
			$table->string('fax',20);
			$table->string('pengurus1',255);
			$table->string('pengurus2',255);
			$table->string('pengurus3',255);
			$table->string('pengawas',255);
			$table->string('email',255);
			$table->decimal('simpanan_pokok',18);
			$table->decimal('simpanan_wajib',18);
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
		Schema::table('usp_koperasis', function(Blueprint $table)
		{
			Schema::drop('usp_koperasis');
		});
	}

}
