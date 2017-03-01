<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_coupon', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('memc_code')->default('')->comment('优惠券code');
			$table->integer('cpns_id')->unsigned()->default(0)->comment('会员优惠券ID');
			$table->integer('member_id')->unsigned()->default(0)->index('ind_member_id')->comment('会员ID');
			$table->string('memc_gen_orderid', 15)->nullable()->index('ind_memc_gen_orderid')->comment('优惠券产生订单号');
			$table->enum('memc_source', array('a','b','c'))->default('a')->comment('优惠券来源(保留)');
			$table->enum('memc_enabled', array('true','false'))->default('true')->comment('留做后用, 可单独取消某些已发放出的优惠券');
			$table->integer('memc_used_times')->nullable()->default(0)->comment('已使用次数');
			$table->integer('memc_gen_time')->unsigned()->nullable()->comment('优惠券产生时间');
			$table->enum('disabled', array('true','busy','false'))->nullable()->default('false')->comment('无效');
			$table->enum('memc_isvalid', array('true','false'))->default('true')->comment('会员优惠券是否当前可用');
			$table->primary(['memc_code','member_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_coupon');
	}

}
