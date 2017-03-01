<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentGoodsPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_goods_point', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('point_id')->comment('ID');
			$table->decimal('goods_point', 2, 1)->nullable()->comment('分数');
			$table->integer('comment_id')->unsigned()->nullable()->comment('评论ID');
			$table->integer('type_id')->unsigned()->default(1)->comment('评论类型');
			$table->integer('member_id')->unsigned()->nullable()->default(0)->comment('会员ID');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->enum('display', array('false','true'))->nullable()->default('false')->comment('前台是否显示');
			$table->text('addon')->nullable()->comment('额外序列化信息');
			$table->enum('disabled', array('false','true'))->nullable()->default('false');
//			$table->index(['goods_id','type_id'], 'ind_point_avg');
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
		Schema::drop('comment_goods_point');
	}

}
