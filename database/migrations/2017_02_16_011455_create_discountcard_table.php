<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountcardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discountcard', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('序号');
			$table->string('brand', 50)->comment('品牌名称');
			$table->string('content')->nullable()->comment('内容');
			$table->integer('begindate')->unsigned()->nullable()->comment('开始时间');
			$table->integer('enddate')->unsigned()->nullable()->comment('结束时间');
			$table->integer('point')->unsigned()->nullable()->comment('积分');
			$table->integer('issuenumber')->unsigned()->nullable()->comment('发行数量');
			$table->decimal('full', 20)->nullable()->default(0.00)->comment('满');
			$table->decimal('discount', 20)->nullable()->default(0.00)->comment('优惠');
			$table->integer('typeid')->unsigned()->comment('类型id');
			$table->string('url_pic')->nullable()->comment('图片');
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
		Schema::drop('discountcard');
	}

}
