<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersErrorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members_error', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_id')->unsigned()->nullable()->index('ind_createtime')->comment('会员用户名');
			$table->integer('etime')->unsigned()->default(0)->comment('错误时间');
			$table->integer('error_num')->unsigned()->nullable()->default(0)->comment('错误计数');
			$table->enum('type', array('check','possword'))->comment('错误类型');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members_error');
	}

}
