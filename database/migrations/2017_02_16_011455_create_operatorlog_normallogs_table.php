<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperatorlogNormallogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operatorlog_normallogs', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->string('username', 50)->comment('操作员');
			$table->string('module', 50)->comment('模块');
			$table->string('operate_type')->comment('操作类型');
			$table->integer('dateline')->unsigned()->index('ind_dateline')->comment('操作时间');
			$table->text('memo')->nullable()->comment('日志内容');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operatorlog_normallogs');
	}

}
