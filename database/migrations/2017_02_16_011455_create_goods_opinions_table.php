<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_opinions', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('推荐ID');
			$table->bigInteger('goods_id')->unsigned()->comment('商品ID');
			$table->bigInteger('order_id')->unsigned()->comment('订单号');
			$table->integer('member_id')->unsigned()->comment('推荐用户');
			$table->string('image', 100)->nullable()->comment('图片');
			$table->text('content', 65535)->comment('推荐内容');
			$table->integer('created')->unsigned()->nullable()->default(0)->comment('推荐时间');
			$table->enum('top', array('0','1'))->nullable()->default('0')->comment('置顶');
			$table->integer('toptime')->unsigned()->nullable()->default(0)->comment('推荐时间');
			$table->enum('fancy', array('0','1'))->nullable()->default('0')->comment('精选');
			$table->integer('c_num')->nullable()->default(0)->comment('评论数');
			$table->integer('p_num')->nullable()->default(0)->comment('点赞数');
			$table->enum('status', array('normal','del'))->nullable()->comment('状态');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_opinions');
	}

}
