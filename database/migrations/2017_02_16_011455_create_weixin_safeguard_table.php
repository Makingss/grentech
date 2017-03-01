<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinSafeguardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_safeguard', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->string('appid', 100)->default('')->comment('公众号ID');
			$table->string('openid', 100)->default('')->comment('用户ID');
			$table->string('weixin_nickname', 100)->nullable()->default('')->comment('微信昵称');
			$table->enum('msgtype', array('request','confirm','reject'))->default('request')->comment('通知类型');
			$table->enum('status', array('1','2','3'))->default('1')->comment('处理状态');
			$table->string('feedbackid', 100)->default('')->comment('投诉单号');
			$table->string('transid', 100)->nullable()->comment('交易订单号');
			$table->text('reason', 65535)->nullable()->comment('用户投诉原因');
			$table->text('solution', 65535)->nullable()->comment('用户希望解决方案');
			$table->text('extinfo', 65535)->nullable()->comment('备注信息+电话');
			$table->text('picurl', 65535)->nullable()->comment('用户上传的图片凭证,最多五张');
			$table->integer('timestamp')->unsigned()->nullable()->comment('创建时间');
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
		Schema::drop('weixin_safeguard');
	}

}
