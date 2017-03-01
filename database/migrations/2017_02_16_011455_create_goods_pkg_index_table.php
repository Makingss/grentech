<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsPkgIndexTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_pkg_index', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('pkg商品ID');
			$table->integer('product_id')->unsigned()->default(0)->comment('pkg货品ID');
			$table->bigInteger('master_goods_id')->unsigned()->default(0)->comment('主商品ID');
			$table->integer('master_product_id')->unsigned()->default(0)->comment('主货品ID');
			$table->bigInteger('slave_goods_id')->unsigned()->default(0)->comment('辅商品ID');
			$table->integer('slave_product_id')->unsigned()->default(0)->comment('辅货品ID');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');$table->timestamps();
//			$table->primary(['product_id','master_product_id','slave_product_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_pkg_index');
	}

}
