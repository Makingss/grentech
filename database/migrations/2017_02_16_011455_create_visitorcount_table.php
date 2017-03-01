<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitorcountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitorcount', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('统计ID');
			$table->string('date', 20)->nullable()->comment('时间');
			$table->integer('shop_id')->unsigned()->nullable()->comment('店铺ID');
			$table->integer('total')->unsigned()->nullable()->comment('当天访问次数');
			$table->unique(['date','shop_id'], 'ind_date_mid');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visitorcount');
	}

}
