<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersLoginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_logins', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_id')->unsigned()->default(0)->primary()->comment('账户序号ID');
			$table->string('login_account', 100)->index('ind_login_account')->comment('登录名');
			$table->enum('login_type', array('local','mobile','email'))->nullable()->default('local')->comment('账户类型');
			$table->string('login_password', 32)->comment('登录密码');
			$table->string('password_account', 100)->comment('登录密码加密所用账号');
			$table->enum('disabled', array('true','false'))->nullable()->default('false');
			$table->string('loginstyle', 100)->nullable()->default('common')->comment('登陆方式 信任登陆/普通登陆');
			$table->string('logindisplay', 100)->nullable()->default('true')->comment('信任登陆只能修改一次用户名');
			$table->integer('createtime')->unsigned()->nullable()->comment('创建时间');
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
		Schema::drop('member_logins');
	}

}
