<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsSpecIndexTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_spec_index', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('type_id')->unsigned()->default(0)->comment('商品类型ID');
			$table->integer('spec_id')->unsigned()->default(0)->comment('规格ID');
			$table->integer('spec_value_id')->unsigned()->default(0)->comment('规格值ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->integer('product_id')->unsigned()->default(0)->comment('货品ID');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
			$table->primary(['spec_value_id','product_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_spec_index');
	}

}
