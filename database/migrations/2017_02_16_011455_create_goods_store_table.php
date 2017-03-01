<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_store', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('ID');
			$table->integer('store_id')->unsigned()->default(0)->comment('店铺ID');
			$table->integer('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->integer('buy_num')->unsigned()->nullable()->comment('起购数量');
			$table->text('remark', 65535)->nullable()->comment('备注');
			$table->integer('time')->unsigned()->nullable()->comment('产生时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_store');
	}

}
