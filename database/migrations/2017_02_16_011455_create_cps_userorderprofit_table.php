<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsUserorderprofitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_userorderprofit', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('profit_id')->comment('ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->index('ind_orderid')->comment('订单号');
			$table->string('u_name', 50)->default('')->index('ind_uname')->comment('联盟商用户名');
			$table->integer('addtime')->unsigned()->default(0)->index('ind_addtime')->comment('下单时间');
			$table->text('refer_url', 65535)->comment('来源地址');
			$table->decimal('order_cost', 20)->default(0.00)->comment('订单金额');
			$table->decimal('money', 20)->default(0.00)->comment('佣金金额');
			$table->enum('state', array('0','1','2'))->default('0')->index('ind_state')->comment('状态');
			$table->integer('u_id')->unsigned()->default(0)->index('ind_u_id')->comment('联盟商ID');
			$table->integer('yam')->unsigned()->default(0)->index('ind_yam')->comment('订单完成年月');
			$table->enum('disabled', array('false','true'))->default('false')->index('ind_disabled')->comment('是否有效');
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
		Schema::drop('cps_userorderprofit');
	}

}
