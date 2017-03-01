<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSellLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sell_logs', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('log_id', true)->comment('销售日志ID');
			$table->integer('member_id')->unsigned()->default(0)->comment('会员ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('订单号');
			$table->string('name', 50)->nullable()->default('')->comment('会员名称');
			$table->decimal('price', 20)->nullable()->default(0.00)->comment('货品价格');
			$table->integer('product_id')->default(0)->comment('货品ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->string('product_name', 200)->nullable()->default('')->comment('货品名称');
			$table->string('spec_info', 200)->nullable()->default('')->comment('商品规格');
			$table->integer('number')->unsigned()->nullable()->default(0)->comment('商品购买数量');
			$table->integer('createtime')->unsigned()->nullable()->comment('记录创建时间');
			$table->index(['member_id','product_id','goods_id'], 'ind_goods_id');
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
		Schema::drop('sell_logs');
	}

}
