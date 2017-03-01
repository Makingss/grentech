<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberSigninTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_signin', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_id')->unsigned()->comment('会员ID');
			$table->date('signin_date')->default('1970-01-01')->comment('签到日期');
			$table->integer('point')->unsigned()->default(0)->comment('签到获得的积分');
			$table->integer('signin_time')->default(0)->comment('签到时间');
			$table->primary(['member_id','signin_date']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_signin');
	}

}
