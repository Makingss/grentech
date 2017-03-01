<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddrCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addr_card', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('身份证id');
			$table->integer('member_id')->unsigned()->default(0)->index('member_id')->comment('会员ID');
			$table->string('card_num', 50)->nullable()->comment('身份证号码');
			$table->string('real_name', 30)->nullable()->comment('真实姓名');
			$table->string('forward')->nullable()->comment('身份证正面图片');
			$table->string('back')->nullable()->comment('身份证反面图片');
			$table->integer('create_time')->unsigned()->nullable()->comment('上传时间');
			$table->integer('addr_id')->unsigned()->default(0)->comment('地址ID');
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
		Schema::drop('addr_card');
	}

}
