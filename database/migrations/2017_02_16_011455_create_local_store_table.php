<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('local_store', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('local_id', true)->comment('门店ID');
			$table->integer('member_id')->nullable()->default(0)->comment('会员ID');
			$table->string('name', 50)->nullable()->comment('地址名称');
			$table->string('local_name', 50)->nullable()->comment('名称');
			$table->string('lastname', 50)->nullable()->comment('姓名');
			$table->string('firstname', 50)->nullable()->comment('姓名');
			$table->string('area')->nullable()->comment('地区');
			$table->string('addr')->nullable()->comment('地址');
			$table->string('zip', 20)->nullable()->comment('邮编');
			$table->string('tel', 50)->nullable()->comment('电话');
			$table->string('mobile', 50)->nullable()->comment('手机');
			$table->string('day')->nullable()->default('任意日期')->comment('上门日期');
			$table->string('time')->nullable()->default('任意时间段')->comment('上门时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('local_store');
	}

}
