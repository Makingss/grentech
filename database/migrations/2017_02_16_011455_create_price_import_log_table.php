<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceImportLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('price_import_log', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('导入id');
			$table->string('bn', 200)->nullable()->comment('sku编号');
			$table->integer('pre_price')->unsigned()->nullable()->default(0)->comment('调整前价格');
			$table->integer('price')->unsigned()->nullable()->default(0)->comment('调整后价格');
			$table->integer('import_time')->unsigned()->nullable()->default(0)->comment('导入时间');
			$table->integer('import_id')->nullable()->default(0)->comment('导入批次id');
			$table->string('spec', 200)->nullable()->comment('说明');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('price_import_log');
	}

}
