<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberBankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_bank', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('member_bank_id')->comment('会员银行卡id');
			$table->integer('member_id')->unsigned()->default(0)->index('member_id')->comment('会员ID');
			$table->string('bank_num', 32)->nullable()->comment('银行卡号');
			$table->string('real_name', 30)->nullable()->comment('真实姓名');
			$table->enum('bank_type', array('1','2','3'))->nullable()->default('1')->comment('账号类型');
			$table->string('bank_name', 50)->nullable()->comment('银行名字');
			$table->integer('create_time')->unsigned()->nullable()->comment('绑定时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_bank');
	}

}
