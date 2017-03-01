<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsStorePromptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_store_prompt', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('prompt_id')->comment('商品库存提示规则ID');
			$table->integer('order_by')->unsigned()->default(0)->comment('排序');
			$table->string('name', 100)->default('0')->comment('名称');
			$table->enum('default', array('0','1'))->default('0')->comment('是否默认');
			$table->text('values')->nullable()->comment('规则值序列化');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_store_prompt');
	}

}
