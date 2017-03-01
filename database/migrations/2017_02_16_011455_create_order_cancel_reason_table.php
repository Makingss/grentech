<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_cancel_reason', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->primary()->comment('订单ID');
			$table->enum('reason_type', array('0','1','2','3','4','5','6','7'))->default('0')->comment('取消原因类型');
			$table->string('reason_desc', 150)->nullable()->comment('其他原因');
			$table->integer('cancel_time')->unsigned()->nullable()->comment('取消时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_cancel_reason');
	}

}
