<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpenidOpenidTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('openid_openid', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_id')->unsigned()->nullable()->comment('用户名');
			$table->string('openid', 50)->default('')->primary()->comment('openid');
			$table->string('provider_openid', 50)->nullable()->comment('第三方标识');
			$table->string('provider_code', 50)->nullable()->comment('编码');
			$table->string('nickname', 50)->nullable()->comment('昵称');
			$table->string('realname', 50)->nullable()->comment('真实姓名');
			$table->string('email', 200)->nullable()->comment('EMAIL');
			$table->enum('gender', array('0','1','2'))->nullable()->comment('性别');
			$table->string('address')->nullable()->comment('地址');
			$table->string('avatar')->nullable()->comment('头像');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('openid_openid');
	}

}
