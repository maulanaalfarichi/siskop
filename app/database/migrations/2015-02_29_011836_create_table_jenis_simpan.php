<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJenisSimpan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usp_jenis_simpan', function(Blueprint $table)
		{
			$table->integer('id','increments');
			$table->string('jenis_simpanan',255);
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
		Schema::table('usp_jenis_simpan', function(Blueprint $table)
		{
			Schema::drop('usp_jenis_simpan');
		});
	}

}
