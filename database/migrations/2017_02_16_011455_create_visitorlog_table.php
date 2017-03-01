<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitorlog', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('日志ID');
			$table->integer('shop_id')->unsigned()->nullable()->comment('店铺ID');
			$table->integer('visit_time')->unsigned()->nullable()->comment('时间戳');
			$table->string('visit_ip', 20)->nullable()->comment('IP地址');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visitorlog');
	}

}
