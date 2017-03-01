<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpressDlyCenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('express_dly_center', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('dly_center_id', true)->comment('发货地址ID');
			$table->string('name', 50)->default('0')->comment('发货地址名称');
			$table->string('address', 200)->comment('发货地址');
			$table->string('region')->nullable()->comment('地区');
			$table->string('zip', 20)->nullable()->comment('邮编');
			$table->string('phone', 100)->nullable()->comment('电话');
			$table->string('uname', 100)->nullable()->comment('姓名');
			$table->string('cellphone', 100)->nullable()->comment('手机');
			$table->enum('sex', array('female','male'))->nullable()->default('male')->comment('性别');
			$table->text('memo')->nullable()->comment('备注');
			$table->enum('disabled', array('true','false'))->default('false');
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
		Schema::drop('express_dly_center');
	}

}
