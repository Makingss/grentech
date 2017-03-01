<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrgTempTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_temp', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('code', 200)->comment('店铺编码');
			$table->string('name', 200)->default('0')->comment('名称全称');
			$table->string('abbrev', 200)->nullable()->comment('名称简称');
			$table->string('head', 200)->nullable()->comment('集团');
			$table->string('branch')->nullable()->comment('区域');
			$table->string('office')->nullable()->comment('办事处');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('org_temp');
	}

}
