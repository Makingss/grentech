<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsOpinionsImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_opinions_image', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('推荐ID');
			$table->integer('opinions_id')->unsigned()->comment('口碑推荐id');
			$table->string('content', 40)->comment('图片标签内容');
			$table->integer('add_x')->unsigned()->nullable()->default(0)->comment('图片标签x坐标');
			$table->integer('add_y')->unsigned()->nullable()->default(0)->comment('图片标签y坐标');
			$table->enum('type', array('1','2'))->comment('标签方向');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_opinions_image');
	}

}
