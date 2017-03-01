<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuySpecialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_special', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('special_id')->comment('规则id');
			$table->string('name')->default('')->comment('规则名称');
			$table->text('description', 65535)->nullable()->comment('规则描述');
			$table->text('images')->nullable()->comment('app促销轮播图');
			$table->text('from_extract', 65535)->nullable()->comment('自提时间');
			$table->integer('release_time')->unsigned()->nullable()->default(0)->comment('发布时间');
			$table->integer('begin_time')->unsigned()->nullable()->default(0)->comment('开始时间');
			$table->integer('end_time')->unsigned()->nullable()->default(0)->comment('结束时间');
			$table->enum('status', array('true','false'))->nullable()->default('false')->comment('状态');
			$table->text('remind_way')->nullable()->comment('提醒方式');
			$table->integer('remind_time')->unsigned()->nullable()->default(0)->comment('提前提醒时间');
			$table->integer('limit')->unsigned()->nullable()->default(0)->comment('限购数量');
			$table->enum('cdown', array('true','false'))->nullable()->default('true')->comment('是显示否倒计时');
			$table->integer('timeout')->unsigned()->nullable()->default(0)->comment('超时时间');
			$table->integer('initial_num')->unsigned()->nullable()->default(0)->comment('初始销售量');
			$table->integer('type_id')->unsigned()->nullable()->comment('促销类型');
			$table->text('promotion_pro')->nullable()->comment('促销商品组合 ');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('starbuy_special');
	}

}
