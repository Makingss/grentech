<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinAlertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_alert', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->string('appid', 100)->default('')->comment('公众号ID');
			$table->integer('errortype')->default(0)->comment('错误编码');
			$table->text('description')->comment('错误描述');
			$table->text('alarmContent')->nullable()->comment('错误详情');
			$table->integer('timestamp')->unsigned()->nullable()->comment('创建时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('weixin_alert');
	}

}
