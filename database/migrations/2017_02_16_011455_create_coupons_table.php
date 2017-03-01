<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupons', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('cpns_id')->comment('优惠券方案id');
			$table->string('cpns_name')->nullable()->comment('优惠券名称');
			$table->integer('pmt_id')->unsigned()->nullable()->comment('促销序号(暂时废弃)');
			$table->string('cpns_prefix', 50)->default('')->index('ind_cpns_prefix')->comment('生成优惠券前缀/号码(当全局时为号码)');
			$table->integer('cpns_gen_quantity')->unsigned()->default(0)->comment('获取的总数量');
			$table->string('cpns_key', 20)->default('')->comment('优惠券生成的key');
			$table->enum('cpns_status', array('0','1'))->default('1')->comment('优惠券方案状态');
			$table->enum('cpns_type', array('0','1'))->default('0')->comment('优惠券类型');
			$table->integer('cpns_point')->unsigned()->nullable()->comment('兑换优惠券积分');
			$table->integer('rule_id')->nullable()->comment('相关的订单促销规则ID');
			$table->integer('cpns_max_num')->unsigned()->nullable()->comment('最大兑换数量');
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
		Schema::drop('coupons');
	}

}
