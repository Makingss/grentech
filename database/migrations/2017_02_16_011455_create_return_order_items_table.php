<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturnOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('return_order_items', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('item_id')->comment('订单明细ID');
			$table->bigInteger('order_sn')->nullable()->default(0)->comment('报损/退货单号');
			$table->integer('product_id')->unsigned()->default(0)->comment('货品ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->integer('type_id')->unsigned()->nullable()->comment('商品类型ID');
			$table->integer('type')->nullable()->default(0)->comment('类型 1为退货2为报损');
			$table->string('bn', 40)->nullable()->index('ind_item_bn')->comment('明细商品的订单号');
			$table->string('name', 200)->nullable()->comment('商品的名称');
			$table->decimal('cost', 20)->nullable()->comment('明细商品的成本');
			$table->decimal('price', 20)->default(0.00)->comment('明细商品的销售价(购入价)');
			$table->decimal('g_price', 20)->default(0.00)->comment('明细商品的会员价原价');
			$table->decimal('amount', 20)->nullable()->comment('商品总额');
			$table->integer('score')->unsigned()->nullable()->comment('明细商品积分');
			$table->integer('weight')->unsigned()->nullable()->comment('明细商品重量');
			$table->integer('local_id')->nullable()->default(0)->comment('门店ID');
			$table->string('local_name', 50)->nullable()->comment('名称');
			$table->float('nums', 10, 0)->default(1)->comment('商品购买数量');
			$table->integer('create_time')->unsigned()->nullable()->comment('退货时间');
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
		Schema::drop('return_order_items');
	}

}
