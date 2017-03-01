<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberPwdlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_pwdlog', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('pwdlog_id')->comment('ID');
			$table->integer('member_id')->unsigned()->comment('会员ID');
			$table->string('secret', 100)->default('')->comment('临时秘钥');
			$table->integer('expiretime')->unsigned()->nullable()->comment('过期时间');
			$table->enum('has_used', array('Y','N'))->default('N')->comment('是否使用过, 如果使用过将失效');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_pwdlog');
	}

}
