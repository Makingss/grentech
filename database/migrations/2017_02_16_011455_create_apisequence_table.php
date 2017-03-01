<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApisequenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apisequence', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('序列ID');
			$table->integer('sequence')->unsigned()->comment('序列号');
			$table->string('sequenceName')->comment('序列名');
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
		Schema::drop('apisequence');
	}

}
