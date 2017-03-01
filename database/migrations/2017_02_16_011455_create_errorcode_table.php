<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErrorcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('errorcode', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('id');
			$table->integer('code_id')->unsigned()->nullable()->comment('code');
			$table->string('controller', 50)->nullable()->comment('控制器');
			$table->string('action', 100)->nullable()->comment('方法');
			$table->string('controllername', 100)->nullable()->comment('控制器名字');
			$table->enum('status', array('1','2'))->nullable()->comment('状态');
			$table->text('msg', 65535)->nullable()->comment('信息');
			$table->string('codehead', 10)->nullable()->comment('编码头');
			$table->string('params', 50)->nullable()->comment('函数参数');
			$table->string('return_code', 200)->nullable()->comment('返回值');
			$table->integer('createtime')->unsigned()->nullable()->comment('创建时间');
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
		Schema::drop('errorcode');
	}

}
