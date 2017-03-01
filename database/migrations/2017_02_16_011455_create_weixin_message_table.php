<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_message', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->integer('bind_id')->unsigned()->default(0)->comment('公众账号');
			$table->integer('message_id')->unsigned()->nullable()->comment('消息名称');
			$table->enum('message_type', array('text','image','customers'))->default('text')->comment('消息类型');
			$table->enum('reply_type', array('attention','message','keywords'))->default('attention')->comment('自动回复类型');
			$table->text('keywords', 65535)->nullable()->comment('关键词');
			$table->enum('keywords_rule', array('nequal','has'))->nullable()->default('nequal')->comment('关键词匹配规则');
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
		Schema::drop('weixin_message');
	}

}
