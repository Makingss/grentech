<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsThirdpartyOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_thirdparty_orders', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id', true)->unsigned()->comment('订单号');
			$table->string('src', 20)->default('')->comment('来源');
			$table->text('url', 65535)->comment('来源地址');
			$table->decimal('order_cost', 20)->default(0.00)->comment('订单金额');
			$table->integer('createtime')->unsigned()->default(0)->index('ind_createtime')->comment('下单时间');
			$table->enum('status', array('0','1','2'))->default('0')->comment('状态');
			$table->text('params', 65535)->comment('参数');
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
		Schema::drop('cps_thirdparty_orders');
	}

}
