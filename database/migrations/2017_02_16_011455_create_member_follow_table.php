<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberFollowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_follow', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_follow_id', true)->comment('会员关注ID');
			$table->integer('member_id')->unsigned()->default(0)->index('member_id')->comment('会员ID');
			$table->integer('follow_id')->unsigned()->nullable()->index('follow_id')->comment('关注会员ID');
			$table->integer('addtime')->unsigned()->comment('添加时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_follow');
	}

}
