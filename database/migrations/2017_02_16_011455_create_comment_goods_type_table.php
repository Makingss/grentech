<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentGoodsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment_goods_type', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('type_id')->comment('ID');
			$table->string('name', 100)->comment('评论类型名称');
			$table->text('addon')->nullable()->comment('序列化');
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
		Schema::drop('comment_goods_type');
	}

}
