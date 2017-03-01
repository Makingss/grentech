<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberWithdrawalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_withdrawal', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->integer('member_id')->unsigned()->index('ind_member_id')->comment('用户ID');
			$table->decimal('amount', 20)->comment('申请提现金额');
			$table->string('alipay_user', 225)->nullable()->default('')->comment('提现支付宝帐号');
			$table->integer('member_bank_id')->unsigned()->comment('提现支付卡ID');
			$table->string('bank_num1', 32)->comment('银行卡号');
			$table->string('bank_name1', 50)->comment('银行名字');
			$table->text('remark', 65535)->nullable()->comment('备注');
			$table->text('serial', 65535)->nullable()->comment('提现流水号');
			$table->integer('create_time')->unsigned()->nullable()->comment('申请时间');
			$table->decimal('member_advance', 20)->default(0.00)->comment('当前余额');
			$table->decimal('member_advanceq', 20)->default(0.00)->comment('提现前余额');
			$table->decimal('member_advances', 20)->default(0.00)->comment('总佣金');
			$table->decimal('member_nofinadv', 20)->default(0.00)->comment('未完成佣金');
			$table->integer('edit_time')->unsigned()->nullable()->comment('修改时间');
			$table->enum('has_op', array('1','2','3'))->nullable()->default('1')->comment('提现状态');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_withdrawal');
	}

}
