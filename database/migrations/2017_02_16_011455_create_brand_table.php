<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brand', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('brand_id')->comment('品牌id');
			$table->string('brand_name', 50)->comment('品牌名称');
			$table->string('brand_url')->nullable()->comment('品牌网址');
			$table->text('brand_desc')->nullable()->comment('品牌介绍');
			$table->string('brand_logo')->nullable()->comment('品牌图片标识');
			$table->text('brand_keywords')->nullable()->comment('品牌别名');
			$table->text('brand_setting')->nullable()->comment('品牌设置');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled')->comment('失效');
			$table->integer('ordernum')->unsigned()->nullable()->index('ind_ordernum')->comment('排序');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
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
		Schema::drop('brand');
	}

}
