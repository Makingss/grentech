<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponlogOrderCouponRefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('couponlog_order_coupon_ref', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('id', true)->unsigned()->comment('优惠券使用记录关联表ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('应用订单号');
			$table->string('memc_code')->nullable()->index('ind_cpnscode')->comment('使用的优惠券号码');
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
		Schema::drop('couponlog_order_coupon_ref');
	}

}
