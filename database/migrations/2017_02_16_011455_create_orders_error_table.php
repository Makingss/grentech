<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersErrorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_error', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->primary()->comment('订单号');
			$table->enum('status', array('0','1'))->default('0')->comment('订单状态');
			$table->text('scaler_num', 65535)->comment('异常记数');
			$table->integer('createtime')->unsigned()->nullable()->comment('创建时间');
			$table->text('message', 65535)->nullable()->comment('订单错误信息');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders_error');
	}

}
