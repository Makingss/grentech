<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderCancelListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_cancel_list', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->primary()->comment('订单ID');
			$table->enum('promotion_type', array('normal','prepare'))->nullable()->default('normal')->comment('销售类型');
			$table->integer('canceltime')->unsigned()->nullable()->index('ind_canceltime')->comment('取消时间');
			$table->string('reason_desc', 150)->nullable()->comment('其他原因');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_cancel_list');
	}

}
