<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberMsgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_msg', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('msg_id')->comment('ID');
			$table->integer('for_id')->nullable()->default(0)->comment('回复哪个信件');
			$table->integer('from_id')->unsigned()->comment('发起会员ID');
			$table->string('from_uname', 100)->nullable()->comment('发信者');
			$table->integer('from_type')->nullable()->default(0)->comment('发信类型');
			$table->integer('to_id')->unsigned()->default(0)->comment('目标会员ID');
			$table->string('to_uname', 100)->nullable()->comment('目标会员姓名');
			$table->string('subject', 100)->comment('消息主题');
			$table->text('content', 65535)->comment('内容');
			$table->bigInteger('order_id')->nullable()->default(0)->comment('订单ID');
			$table->integer('create_time')->unsigned()->nullable()->comment('发送时间');
			$table->integer('to_time')->unsigned()->nullable()->comment('发送时间');
			$table->enum('has_read', array('true','false'))->nullable()->default('false')->comment('是否已读');
			$table->enum('keep_unread', array('true','false'))->nullable()->default('false')->comment('保持未读');
			$table->enum('has_star', array('true','false'))->nullable()->default('false')->comment('是否打上星标');
			$table->enum('has_sent', array('true','false'))->nullable()->default('true')->comment('是否发送');
			$table->index(['to_id','has_read','has_sent'], 'ind_to_id');
			$table->index(['from_id','has_read','has_sent'], 'ind_from_id');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_msg');
	}

}
