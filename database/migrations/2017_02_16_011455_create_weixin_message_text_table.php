<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinMessageTextTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_message_text', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->string('name')->comment('消息名称');
			$table->text('content')->nullable()->comment('消息内容');
			$table->enum('is_check_bind', array('true','false'))->nullable()->default('false')->comment('发生此消息前是否需要验证绑定');
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
		Schema::drop('weixin_message_text');
	}

}
