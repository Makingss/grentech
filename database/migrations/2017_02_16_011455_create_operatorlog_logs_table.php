<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperatorlogLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operatorlog_logs', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->string('username', 50)->index('ind_username')->comment('操作员');
			$table->string('realname', 50)->comment('姓名');
			$table->integer('dateline')->unsigned()->index('ind_dateline')->comment('操作时间');
			$table->enum('operate_type', array('normal','members','goods','orders'))->nullable()->default('normal')->comment('操作类型');
			$table->string('operate_key')->nullable()->index('ind_operate_key')->comment('主关键字');
			$table->text('memo')->nullable()->comment('操作内容');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operatorlog_logs');
	}

}
