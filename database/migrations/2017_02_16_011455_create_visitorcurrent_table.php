<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorcurrentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitorcurrent', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('统计ID');
			$table->integer('shop_id')->unsigned()->nullable()->unique('ind_date_mid')->comment('店铺ID');
			$table->integer('total')->unsigned()->nullable()->default(0)->comment('当天访问次数');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visitorcurrent');
	}

}
