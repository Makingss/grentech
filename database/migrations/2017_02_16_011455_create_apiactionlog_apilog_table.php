<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiactionlogApilogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apiactionlog_apilog', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('apilog_id', true)->unsigned();
			$table->string('apilog', 32)->nullable()->default('')->comment('日志编号');
			$table->string('original_bn', 50)->nullable()->comment('单据号');
			$table->string('msg_id', 60)->nullable()->comment('msg_id');
			$table->string('task_name')->nullable()->comment('任务名称');
			$table->integer('calltime')->unsigned()->nullable()->index('ind_calltime')->comment('请求时间');
			$table->enum('status', array('running','success','fail','sending'))->default('sending')->comment('状态');
			$table->string('worker', 200)->nullable()->comment('api方法名');
			$table->text('params')->nullable()->comment('任务参数');
			$table->text('callback_url')->nullable()->comment('callback地址');
			$table->text('msg', 65535)->nullable()->comment('错误原因');
			$table->enum('log_type', array('order','goods','items','member','payments','coupon','other'))->nullable()->comment('日志类型');
			$table->enum('api_type', array('response','request'))->default('request')->comment('同步类型');
			$table->integer('retry')->unsigned()->nullable()->default(0)->comment('重试次数');
			$table->integer('createtime')->unsigned()->nullable()->comment('发起同步时间');
			$table->integer('last_modified')->unsigned()->nullable()->comment('最后重试时间');
			$table->index(['msg_id','api_type'], 'ind_msg_id_api_type');
			$table->index(['status','api_type'], 'ind_status_api_type');
			$table->index(['apilog','api_type','calltime'], 'ind_apilog_api_type_calltime');
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
		Schema::drop('apiactionlog_apilog');
	}

}
