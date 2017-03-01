<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderPmtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_pmt', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('pmt_id')->comment('促销规则id');
			$table->bigInteger('order_id')->unsigned()->comment('订单id');
			$table->integer('product_id')->unsigned()->nullable()->comment('商品ID');
			$table->enum('pmt_type', array('order','goods','coupon'))->default('goods')->comment('优惠规则类型');
			$table->decimal('pmt_amount', 20)->default(0.00);
			$table->text('pmt_tag')->nullable();
			$table->text('pmt_memo')->nullable();
			$table->text('pmt_describe')->nullable();
			$table->primary(['pmt_id','order_id','pmt_type']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_pmt');
	}

}
