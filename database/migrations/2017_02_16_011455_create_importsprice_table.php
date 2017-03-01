<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportspriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('importsprice', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('import_id', true)->comment('导入id');
			$table->integer('import_time')->unsigned()->nullable()->default(0)->comment('导入时间');
			$table->enum('import_status', array('0','1'))->default('0')->comment('审核状态');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('importsprice');
	}

}
