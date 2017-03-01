<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsOpinionsCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_opinions_comment', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('主键ID');
			$table->integer('opinions_id')->unsigned()->comment('推荐ID');
			$table->integer('member_id')->unsigned()->comment('推荐评论用户');
			$table->text('content', 65535)->nullable()->comment('推荐评论内容');
			$table->integer('created')->unsigned()->comment('推荐评论时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_opinions_comment');
	}

}
