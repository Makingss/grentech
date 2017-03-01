<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderscountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderscount', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('记录ID');
			$table->string('date', 20)->nullable()->comment('日期');
			$table->integer('member_id')->unsigned()->nullable()->comment('用户ID');
			$table->integer('c_advance')->unsigned()->nullable()->comment('日佣金');
			$table->integer('c_orders')->unsigned()->nullable()->comment('日订单数');
			$table->unique(['date','member_id'], 'ind_date_mid');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderscount');
	}

}
