<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('item_id')->comment('订单明细ID');
			$table->bigInteger('order_id')->unsigned()->default(0)->index('ind_order_id')->comment('订单ID');
			$table->bigInteger('parent_order_id')->unsigned()->nullable()->default(0)->comment('父订单号,该字段值大于0 表示该订单是子订单');
			$table->integer('obj_id')->unsigned()->default(0)->index('ind_obj_id')->comment('订单明细对应的商品对象ID, 对应到order_objects表');
			$table->integer('product_id')->unsigned()->default(0)->comment('货品ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->integer('type_id')->unsigned()->nullable()->comment('商品类型ID');
			$table->string('bn', 40)->nullable()->index('ind_item_bn')->comment('明细商品的品牌名');
			$table->string('name', 200)->nullable()->comment('明细商品的名称');
			$table->decimal('cost', 20)->nullable()->comment('明细商品的成本');
			$table->decimal('price', 20)->default(0.00)->comment('明细商品的销售价(购入价)');
			$table->decimal('g_price', 20)->default(0.00)->comment('明细商品的会员价原价');
			$table->decimal('amount', 20)->nullable()->comment('明细商品总额');
			$table->integer('score')->unsigned()->nullable()->comment('明细商品积分');
			$table->integer('weight')->unsigned()->nullable()->comment('明细商品重量');
			$table->float('nums', 10, 0)->default(1)->comment('明细商品购买数量');
			$table->float('sendnum', 10, 0)->default(0)->comment('明细商品发货数量');
			$table->text('addon')->nullable()->comment('明细商品的规格属性');
			$table->enum('is_opinions', array('0','1'))->nullable()->default('0')->comment('是否推荐过');
			$table->enum('is_comment', array('0','1'))->nullable()->default('0')->comment('是否评论过');
			$table->enum('item_type', array('product','pkg','gift','adjunct'))->default('product')->comment('明细商品类型');
			$table->enum('aftersale_status', array('0','1'))->nullable()->default('0')->comment('是否申请售后');
			$table->string('buy_code', 20)->nullable()->default('')->comment('推广代码');
			$table->string('buy_url', 200)->nullable()->default('')->comment('推广URL');
			$table->string('buyurl', 200)->nullable()->default('')->comment('推广URL');
			$table->boolean('user_cancel_status')->default(0)->comment('售前产品状态，用户是否需要该产品,0:需要，1:不需要');
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
		Schema::drop('order_items');
	}

}
