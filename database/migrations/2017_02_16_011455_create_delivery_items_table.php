<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_items', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('item_id')->comment('序号');
			$table->bigInteger('delivery_id')->unsigned()->default(0)->comment('发货单号');
			$table->integer('order_item_id')->unsigned()->nullable()->default(0)->comment('发货明细订单号');
			$table->enum('item_type', array('goods','gift','pkg','adjunct'))->default('goods')->comment('商品类型');
			$table->bigInteger('product_id')->unsigned()->default(0)->comment('货品ID');
			$table->string('product_bn', 30)->nullable()->comment('货品号');
			$table->string('product_name', 200)->nullable()->comment('货品名称');
			$table->float('number', 10, 0)->default(0)->comment('发货数量');
			$table->string('agency_no', 30)->nullable()->default('')->comment('发货商编号');
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
		Schema::drop('delivery_items');
	}

}
