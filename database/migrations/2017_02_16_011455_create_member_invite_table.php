<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberInviteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_invite', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('invite_id', true)->comment('会员邀请ID');
			$table->integer('member_id')->unsigned()->index('member_id')->comment('会员ID');
			$table->string('invite_phone', 50)->nullable()->index('invite_phone')->comment('邀请手机号');
			$table->integer('invite_time')->unsigned()->nullable()->default(0)->comment('邀请时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_invite');
	}

}
