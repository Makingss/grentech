<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAftersalesReturnProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aftersales_return_product', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->comment('订单号');
			$table->integer('member_id')->unsigned()->default(0)->comment('申请人');
			$table->bigInteger('return_id')->primary()->comment('退货记录流水号');
			$table->string('return_bn', 32)->nullable()->comment('退货记录流水号标识');
			$table->string('title', 200)->comment('售后服务标题');
			$table->text('content')->nullable()->comment('退货内容');
			$table->enum('type', array('1','2','3'))->default('1')->comment('售后服务类型');
			$table->enum('status', array('1','2','3','4','5','6','7','8','9'))->default('1')->comment('退货记录状态');
			$table->string('image_file')->nullable()->comment('附件');
			$table->text('product_data')->nullable()->comment('退货货品记录');
			$table->text('comment')->nullable()->comment('管理员备注');
			$table->integer('add_time')->unsigned()->nullable()->comment('创建时间');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
			$table->enum('disabled', array('true','false'))->default('false')->comment('是否有效');
			$table->enum('sync_lijing', array('0','1'))->nullable()->default('0')->comment('同步丽晶');
			$table->enum('is_reship', array('0','1'))->nullable()->default('0')->comment('是否生成退货单');
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
		Schema::drop('aftersales_return_product');
	}

}
