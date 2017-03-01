<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDeliveryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_delivery', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('订单ID');
			$table->enum('dlytype', array('delivery','reship'))->default('delivery')->comment('单据类型');
			$table->string('dly_id', 20)->comment('关联单号');
			$table->text('items', 65535)->nullable()->comment('货品明细');
			$table->primary(['order_id','dly_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_delivery');
	}

}
