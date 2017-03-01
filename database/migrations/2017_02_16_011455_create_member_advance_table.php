<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberAdvanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_advance', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('log_id')->comment('日志id');
			$table->integer('member_id')->unsigned()->default(0)->comment('用户id');
			$table->decimal('money', 20)->default(0.00)->comment('出入金额');
			$table->string('message')->nullable()->comment('管理备注');
			$table->integer('mtime')->unsigned()->default(0)->index('ind_mtime')->comment('交易时间');
			$table->string('payment_id', 20)->nullable()->comment('支付单号');
			$table->bigInteger('order_id')->unsigned()->nullable()->comment('订单号');
			$table->string('paymethod', 100)->nullable()->comment('支付方式');
			$table->string('memo', 100)->nullable()->comment('业务摘要');
			$table->decimal('import_money', 20)->default(0.00)->comment('存入金额');
			$table->decimal('explode_money', 20)->default(0.00)->comment('支出金额');
			$table->decimal('member_advance', 20)->default(0.00)->comment('当前余额');
			$table->decimal('shop_advance', 20)->default(0.00)->comment('商店余额');
			$table->enum('is_fx', array('true','false'))->default('false')->comment('是否佣金');
			$table->enum('is_finish', array('true','false'))->default('false')->comment('是否完成');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled')->comment('失效');
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
		Schema::drop('member_advance');
	}

}
