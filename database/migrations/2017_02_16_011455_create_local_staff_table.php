<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('local_staff', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('staff_id')->comment('员工ID');
			$table->string('login_name', 100)->unique('login_name')->comment('登录名');
			$table->string('login_password', 32)->nullable()->comment('登录密码');
			$table->integer('branch_id')->unsigned()->index('branch_id')->comment('仓库id');
			$table->string('staff_name', 200)->comment('员工姓名');
			$table->integer('logintime')->unsigned()->nullable()->comment('登陆时间');
			$table->integer('logouttime')->unsigned()->nullable()->comment('退出时间');
			$table->integer('ctime')->unsigned()->comment('创建时间');
			$table->enum('disabled', array('true','false'))->default('false')->comment('是否失效');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('local_staff');
	}

}
