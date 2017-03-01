<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('product_id')->comment('货品ID');
			$table->string('jooge_product_id', 200)->nullable()->comment('货品ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->index('ind_goods_id')->comment('商品ID');
			$table->string('barcode', 200)->default('0')->index('ind_barcode')->comment('条形码');
			$table->string('title')->nullable()->comment('标题');
			$table->string('bn', 30)->nullable()->unique('ind_bn')->comment('货号');
			$table->decimal('price', 20)->default(0.00)->comment('销售价格');
			$table->decimal('cost', 20)->default(0.00)->comment('成本价');
			$table->decimal('mktprice', 20)->nullable()->comment('市场价');
			$table->string('name', 200)->default('')->comment('货品名称');
			$table->decimal('weight', 20, 3)->nullable()->comment('单位重量');
			$table->decimal('g_weight', 20, 3)->nullable()->comment('净重');
			$table->string('unit', 20)->nullable()->comment('单位');
			$table->integer('store')->unsigned()->nullable()->default(0)->index('idx_store')->comment('库存');
				$table->string('store_place')->nullable()->comment('库位');
			$table->integer('freez')->unsigned()->nullable()->comment('冻结库存');
			$table->enum('goods_type', array('normal','bind','gift'))->default('normal')->index('idx_goods_type')->comment('销售类型');
			$table->text('spec_info')->nullable()->comment('物品描述');
			$table->text('spec_desc')->nullable()->comment('规格值,序列化');
			$table->integer('is_default')->default(0);
			$table->string('qrcode_image_id', 32)->nullable()->comment('二维码图片ID');
			$table->integer('uptime')->unsigned()->nullable()->comment('录入时间');
			$table->integer('last_modify')->unsigned()->nullable()->comment('最后修改时间');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->integer('marketable')->default(0)->comment('上架');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
