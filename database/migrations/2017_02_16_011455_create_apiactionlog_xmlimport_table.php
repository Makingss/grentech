<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiactionlogXmlimportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apiactionlog_xmlimport', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('log_id')->comment('日志ID');
			$table->string('file_name', 50)->comment('文件名称');
			$table->text('log_data')->nullable()->comment('说明');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
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
		Schema::drop('apiactionlog_xmlimport');
	}

}
