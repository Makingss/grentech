<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsOpinionsPraiseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_opinions_praise', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('主键ID');
			$table->integer('opinions_id')->unsigned()->comment('推荐ID');
			$table->integer('member_id')->unsigned()->comment('点赞用户');
			$table->integer('created')->unsigned()->comment('点赞时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_opinions_praise');
	}

}
