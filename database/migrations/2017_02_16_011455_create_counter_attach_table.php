<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCounterAttachTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('counter_attach', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('counter_value')->unsigned()->nullable()->default(0)->index('uni_value')->comment('计数值');
			$table->integer('attach_id')->unsigned()->default(0)->comment('关联id');
			$table->integer('counter_id')->unsigned()->comment('计数器ID');
			$table->primary(['attach_id','counter_id']);
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
		Schema::drop('counter_attach');
	}

}
