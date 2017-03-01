<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderCardRelationsWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_card_relations_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('Id', true)->comment('自增编号');
			$table->string('OrderId', 48)->index('OrderId')->comment('订单编号');
			$table->string('ReceiveId', 48)->index('ReceiveId')->comment('用户使用卡券编号');
			$table->integer('CreateTime')->unsigned()->comment('卡券使用时间');
			$table->integer('CardId')->index('CardId')->comment('卡券id');
			$table->string('CardUseTitle', 50)->comment('卡券使用说明');
			$table->string('UserCardCode', 100)->comment('该订单使用的卡券编号');
			$table->integer('MemberId')->unsigned()->index('MemberId')->comment('用户id');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_card_relations_wx');
	}

}
