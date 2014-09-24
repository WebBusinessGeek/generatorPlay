<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBioAndTotalBooksWrittenToAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('authors', function(Blueprint $table)
		{
			$table->text('bio')->nullable();
			$table->integer('totalBooksWritten');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('authors', function(Blueprint $table)
		{
			$table->dropColumn('bio');
			$table->dropColumn('totalBooksWritten');
		});
	}

}
