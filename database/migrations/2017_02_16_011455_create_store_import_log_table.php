<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreImportLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_import_log', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('导入id');
			$table->string('bn', 200)->nullable()->comment('sku编号');
			$table->integer('pre_store')->unsigned()->nullable()->default(0)->comment('调整前库存');
			$table->integer('store')->unsigned()->nullable()->default(0)->comment('调整后库存');
			$table->string('import_time', 30)->nullable()->default('0')->comment('导入时间');
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
		Schema::drop('store_import_log');
	}

}
