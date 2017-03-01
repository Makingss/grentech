<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinBindTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_bind', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->string('name', 100)->default('')->comment('公众账号名称');
			$table->string('eid', 100)->unique('eid')->comment('微信公众账号api中标识');
			$table->string('weixin_id', 100)->default('')->comment('原始ID');
			$table->string('weixin_account', 20)->default('')->comment('微信号');
			$table->enum('status', array('active','disabled'))->default('active')->comment('状态');
			$table->enum('weixin_type', array('subscription','service'))->default('subscription')->comment('微信账号类型');
			$table->string('email', 30)->comment('登录邮箱');
			$table->string('avatar', 32)->nullable()->comment('头像');
			$table->string('url', 100)->comment('接口配置URL');
			$table->string('token', 100)->comment('接口配置token');
			$table->string('appid', 100)->nullable()->comment('AppId');
			$table->string('appsecret', 100)->nullable()->comment('AppSecret');
			$table->char('qr', 32)->nullable()->comment('二维码');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('weixin_bind');
	}

}
