<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTrackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_track', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->string('member_id', 50)->nullable()->comment('会员ID');
			$table->integer('time')->unsigned()->nullable()->comment('时间');
			$table->string('goods_id', 1000)->nullable()->comment('商品数据');
			$table->string('page_name', 1000)->nullable()->comment('页面数据');
			$table->integer('goods_nums')->unsigned()->nullable()->comment('产品次数');
			$table->integer('page_nums')->unsigned()->nullable()->comment('页面次数');
			$table->integer('skim_number')->unsigned()->nullable()->comment('阅读次数');
			$table->string('remarks')->nullable()->comment('备注');
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
		Schema::drop('user_track');
	}

}
