<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_brand', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('type_id')->unsigned()->default(0)->comment('商品类型ID');
			$table->integer('brand_id')->unsigned()->default(0)->comment('品牌ID');
			$table->integer('brand_order')->unsigned()->nullable()->comment('排序');
			$table->primary(['type_id','brand_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type_brand');
	}

}
