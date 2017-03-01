<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stat_temp', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('订单号');
			$table->string('goods_id', 200)->nullable()->comment('商品编号');
			$table->string('barcode', 40)->nullable()->comment('明细商品的品牌名');
			$table->string('goods_name', 200)->nullable()->default('')->comment('商品名称');
			$table->string('brand_name', 50)->nullable()->comment('品牌名称');
			$table->float('nums', 10, 0)->nullable()->default(1)->comment('明细商品购买数量');
			$table->decimal('amount', 20)->nullable()->comment('明细商品总额');
			$table->enum('status', array('active','dead','finish','cancel'))->default('active')->comment('订单状态');
			$table->enum('ship_status', array('0','1','2','3','4','5','6','7','8'))->default('0')->comment('发货状态');
			$table->enum('pay_status', array('0','1','2','3','4','5'))->default('0')->comment('付款状态');
			$table->string('goods_share_id', 100)->nullable()->comment('丽晶会员');
			$table->string('goods_share_storeno', 100)->nullable()->comment('关联店铺编号');
			$table->string('abbrev', 200)->nullable()->comment('名称简称');
			$table->string('goods_share_area')->nullable()->comment('区域');
			$table->string('member_id', 100)->nullable()->comment('丽晶会员');
			$table->string('member_share_id', 100)->nullable()->comment('丽晶会员');
			$table->string('member_share_storeno', 100)->nullable()->comment('关联店铺编号');
			$table->string('member_share_area')->nullable()->comment('区域');
			$table->integer('order_time')->unsigned()->nullable()->comment('下单时间');
			$table->integer('last_modified')->unsigned()->nullable()->comment('最后更新时间');
			$table->integer('share_type')->nullable();$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stat_temp');
	}

}
