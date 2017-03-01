<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhoneCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_code', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('id');
			$table->string('phone', 50)->nullable()->comment('会员ID');
			$table->text('message', 65535)->nullable()->comment('订单错误信息');
			$table->integer('createtime')->unsigned()->nullable()->comment('创建时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phone_code');
	}

}
