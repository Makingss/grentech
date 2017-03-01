<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperatorlogRegisterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operatorlog_register', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->string('app', 50)->comment('程序目录');
			$table->string('ctl', 50)->comment('控制器');
			$table->string('act', 50)->nullable()->comment('动作');
			$table->enum('method', array('post','get'))->default('post')->comment('提交方法');
			$table->string('module')->comment('日志模块');
			$table->string('operate_type')->comment('操作类型');
			$table->string('template')->nullable()->comment('模板');
			$table->string('param')->nullable()->comment('参数');
			$table->string('prk')->nullable()->default('0')->comment('修改项唯一值');
			$table->unique(['app','ctl','act'], 'ind_index');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operatorlog_register');
	}

}
