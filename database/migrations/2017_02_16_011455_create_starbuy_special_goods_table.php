<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuySpecialGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_special_goods', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->integer('special_id')->unsigned()->nullable()->comment('规则id');
			$table->integer('product_id')->unsigned()->nullable()->comment('货品id');
			$table->integer('type_id')->unsigned()->nullable()->comment('促销类型id');
			$table->decimal('promotion_price', 20)->nullable()->comment('促销价格');
			$table->integer('release_time')->unsigned()->nullable()->default(0)->comment('发布时间');
			$table->integer('begin_time')->unsigned()->nullable()->default(0)->comment('开始时间');
			$table->integer('end_time')->unsigned()->nullable()->default(0)->comment('结束时间');
			$table->integer('limit')->unsigned()->nullable()->comment('限购数量');
			$table->text('remind_way')->nullable()->comment('提醒方式');
			$table->integer('remind_time')->unsigned()->nullable()->comment('提前提醒时间');
			$table->integer('timeout')->unsigned()->nullable()->comment('超时时间');
			$table->enum('cdown', array('true','false'))->nullable()->comment('是显示否倒计时');
			$table->integer('initial_num')->unsigned()->nullable()->comment('初始销售量');
			$table->enum('status', array('true','false'))->nullable()->default('false')->comment('状态');
			$table->text('description', 65535)->nullable()->comment('规则描述');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('starbuy_special_goods');
	}

}
