<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApitokenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apitoken', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('序列ID');
			$table->string('api_ticket')->comment('api_ticket');
			$table->string('oldapi_ticket')->comment('oldapi_ticket');
			$table->string('token')->comment('微信token');
			$table->integer('jsapi_time')->unsigned()->comment('jsapi过期时间');
			$table->integer('api_time')->unsigned()->comment('api过期时间');
			$table->integer('time')->unsigned()->comment('过期时间');
			$table->string('oldtoken')->comment('微信oldtoken');
			$table->string('access_token')->comment('access_token');
			$table->string('oldaccess_token')->comment('oldaccess_token');
			$table->integer('old_time')->unsigned()->comment('上次过期时间');
			$table->integer('token_number')->unsigned()->comment('更新次数');
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
		Schema::drop('apitoken');
	}

}
