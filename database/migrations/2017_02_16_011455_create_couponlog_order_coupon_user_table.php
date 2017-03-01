<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponlogOrderCouponUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('couponlog_order_coupon_user', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('id', true)->unsigned()->comment('ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('应用订单号');
			$table->integer('cpns_id')->unsigned()->default(0)->index('ind_cpnsid')->comment('优惠券方案ID');
			$table->string('cpns_name')->nullable()->index('ind_cpnsname')->comment('优惠券方案名称');
			$table->integer('usetime')->unsigned()->nullable()->comment('使用时间');
			$table->decimal('total_amount', 20)->default(0.00)->comment('订单金额');
			$table->integer('member_id')->unsigned()->nullable()->comment('使用者');
			$table->string('memc_code')->nullable()->index('ind_cpnscode')->comment('使用的优惠券号码');
			$table->enum('cpns_type', array('0','1','2'))->nullable()->comment('优惠券类型');
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
		Schema::drop('couponlog_order_coupon_user');
	}

}
