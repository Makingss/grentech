<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorePreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_pre', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('导入id');
			$table->string('bn', 200)->nullable()->comment('商品编号');
			$table->integer('store')->unsigned()->nullable()->default(0)->comment('库存');
			$table->integer('improt_id')->nullable()->default(0)->comment('导入时间id');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_pre');
	}

}
