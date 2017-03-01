<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_message', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('message_id')->comment('我的消息ID');
			$table->integer('member_id')->unsigned()->nullable()->default(0)->comment('用户ID');
			$table->enum('message_type', array('comment','praise','fans','sysmsg'))->comment('消息类型');
			$table->enum('is_read', array('0','1'))->default('0')->comment('是否已读');
			$table->integer('time')->unsigned()->comment('添加时间');
			$table->text('detail', 65535)->nullable()->comment('评论内容或系统消息，可为null');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_message');
	}

}
