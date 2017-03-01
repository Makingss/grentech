<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegentApimemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regent_apimember', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('name', 10)->nullable();
			$table->string('sid', 100)->nullable()->index('sid');
			$table->string('channelcode', 50)->nullable();
			$table->string('channelname', 200)->nullable();
			$table->string('area1', 20)->nullable();
			$table->string('area2', 20)->nullable();$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regent_apimember');
	}

}
