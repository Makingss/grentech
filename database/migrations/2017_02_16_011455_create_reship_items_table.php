<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReshipItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reship_items', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('item_id')->comment('发/退货单明细ID');
			$table->bigInteger('reship_id')->unsigned()->default(0)->comment('发/退货单ID');
			$table->integer('order_item_id')->unsigned()->nullable()->default(0)->comment('订单明细ID');
			$table->enum('item_type', array('goods','gift','pkg','adjunct'))->default('goods')->comment('退/换货商品类型');
			$table->bigInteger('product_id')->unsigned()->default(0)->comment('货品ID');
			$table->string('product_bn', 30)->nullable()->comment('货品品牌名');
			$table->string('product_name', 200)->nullable()->comment('货品名');
			$table->float('number', 10, 0)->default(0)->comment('退/换货数量');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reship_items');
	}

}
