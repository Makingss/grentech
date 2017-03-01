<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuySpecialRemindTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_special_remind', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('remind_id');
			$table->integer('member_id')->unsigned()->nullable();
			$table->integer('product_id')->unsigned()->nullable();
			$table->integer('type_id')->unsigned()->nullable();
			$table->string('goodsname', 50)->nullable();
			$table->string('remind_way', 50)->nullable();
			$table->string('goal', 50)->nullable();
			$table->integer('savetime')->unsigned()->nullable();
			$table->integer('remind_time')->unsigned()->nullable();
			$table->integer('begin_time')->unsigned()->nullable();$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('starbuy_special_remind');
	}

}
