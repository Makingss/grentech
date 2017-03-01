<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberFansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_fans', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('主键id');
			$table->integer('member_id')->unsigned()->default(0)->comment('会员ID');
			$table->integer('fans_id')->unsigned()->default(0)->comment('粉丝ID');
			$table->integer('created')->unsigned()->comment('关注时间');
			$table->enum('disabled', array('true','false'))->nullable()->default('false');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_fans');
	}

}
