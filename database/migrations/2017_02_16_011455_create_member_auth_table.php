<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberAuthTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_auth', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('auth_id', true)->comment('会员认证ID');
			$table->integer('member_id')->unsigned()->index('member_id')->comment('会员ID');
			$table->string('real_name', 50)->nullable()->comment('真实姓名');
			$table->string('identity_num', 32)->nullable()->comment('身份证号');
			$table->enum('is_checked', array('1','2','3'))->nullable()->default('1')->comment('审核是否通过');
			$table->char('image_id', 32)->nullable()->comment('上传图片id');
			$table->string('upimage')->nullable()->comment('上传图片');
			$table->integer('uptime')->unsigned()->nullable()->comment('申请时间');
			$table->integer('checktime')->unsigned()->nullable()->comment('审核时间');
			$table->string('remark', 225)->nullable()->comment('审核备注/说明');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_auth');
	}

}
