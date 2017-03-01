<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderidTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderid_temp', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('order_id', 200)->comment('order_id');
			$table->string('cour_id', 200)->comment('cour_id');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderid_temp');
	}

}
