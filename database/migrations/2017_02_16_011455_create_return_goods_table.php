<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturnGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('return_goods', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('re_id', true)->comment('退货/报损ID');
			$table->integer('type')->nullable()->default(0)->comment('类型');
			$table->bigInteger('order_sn')->nullable()->default(0)->comment('退货/报损单号');
			$table->integer('local_id')->nullable()->default(0)->comment('门店ID');
			$table->string('local_name', 50)->nullable()->comment('名称');
			$table->decimal('price', 20)->default(0.00)->comment('退货的销售总价');
			$table->integer('create_time')->unsigned()->nullable()->comment('退货时间');
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
		Schema::drop('return_goods');
	}

}
