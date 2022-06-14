<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTableKoperasis extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('koperasis', function(Blueprint $table)
		{
			Schema::rename('koperasis','usp_koperasis');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('koperasis', function(Blueprint $table)
		{
			//
		});
	}

}
