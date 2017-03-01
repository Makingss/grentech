<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsRateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_rate', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('goods_1')->unsigned()->default(0)->comment('关联商品ID');
			$table->integer('goods_2')->unsigned()->default(0)->comment('被关联商品ID');
			$table->enum('manual', array('left','both'))->nullable()->comment('关联方式');
			$table->integer('rate')->unsigned()->default(1)->comment('关联比例');
			$table->primary(['goods_1','goods_2']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_rate');
	}

}
