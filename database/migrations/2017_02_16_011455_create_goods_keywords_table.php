<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_keywords', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id');
			$table->bigInteger('goods_id')->unsigned()->default(0)->comment('商品ID');
			$table->string('keyword', 40)->default('')->comment('搜索关键字');
			$table->string('refer')->nullable()->default('')->comment('来源');
			$table->enum('res_type', array('goods','article'))->default('goods')->comment('搜索结果类型');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
			$table->primary(['goods_id','keyword','res_type']);
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
		Schema::drop('goods_keywords');
	}

}
