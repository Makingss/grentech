<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_setting', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('skey', 20)->primary()->comment('关键字');
			$table->text('value', 65535)->comment('保存数据');
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
		Schema::drop('cps_setting');
	}

}
