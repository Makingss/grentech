<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWxCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wx_coupon', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ID');
			$table->integer('wx_batch_id')->unsigned()->comment('微信红包券批号');
			$table->integer('use_start_time')->unsigned()->nullable()->comment('开始时间');
			$table->integer('use_end_time')->unsigned()->nullable()->comment('结束时间');
			$table->string('brand_id', 50)->nullable()->comment('结束时间');
			$table->integer('amount_open')->unsigned()->nullable()->comment('金额区间');
			$table->integer('amount_close')->unsigned()->nullable()->comment('金额区间');
			$table->string('remark', 50)->nullable()->comment('备注');
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
		Schema::drop('wx_coupon');
	}

}
