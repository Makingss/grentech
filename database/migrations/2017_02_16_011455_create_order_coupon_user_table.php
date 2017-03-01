<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderCouponUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_coupon_user', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('应用订单号');
			$table->integer('cpns_id')->unsigned()->default(0)->comment('优惠券方案ID');
			$table->string('cpns_name')->nullable()->comment('优惠券方案名称');
			$table->integer('usetime')->unsigned()->nullable()->comment('使用时间');
			$table->string('memc_code')->nullable()->comment('使用的优惠券号码');
			$table->enum('cpns_type', array('0','1','2'))->nullable()->comment('优惠券类型0全局 1用户 2外部优惠券');
			$table->primary(['order_id','cpns_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_coupon_user');
	}

}
