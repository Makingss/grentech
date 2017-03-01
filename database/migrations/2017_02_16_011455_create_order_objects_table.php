<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderObjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_objects', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('obj_id')->comment('订单商品对象ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->index('ind_order_id')->comment('订单ID');
			$table->string('obj_type', 50)->default('')->comment('对象类型');
			$table->string('obj_alias', 100)->default('')->comment('对象别名');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->string('bn', 40)->nullable()->index('ind_obj_bn')->comment('品牌名');
			$table->string('name', 200)->nullable()->comment('商品对象名字');
			$table->decimal('price', 20)->default(0.00)->comment('商品对象单价');
			$table->decimal('amount', 20)->default(0.00)->comment('商品对象总金额');
			$table->float('quantity', 10, 0)->default(1)->comment('商品对象购买量');
			$table->integer('weight')->unsigned()->nullable()->comment('总重量');
			$table->integer('score')->unsigned()->nullable()->comment('获得积分');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_objects');
	}

}
