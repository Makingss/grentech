<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_regions', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('region_id')->comment('区域序号');
			$table->string('local_name', 50)->default('')->comment('地区名称');
			$table->string('package', 20)->default('')->comment('地区包的类别, 中国/外国等. 中国大陆的编号目前为mainland');
			$table->integer('p_region_id')->unsigned()->nullable()->comment('上一级地区的序号');
			$table->string('region_path')->nullable()->comment('序号层级排列结构');
			$table->integer('region_grade')->unsigned()->nullable()->comment('地区层级');
			$table->string('p_1', 50)->nullable()->comment('额外参数1');
			$table->string('p_2', 50)->nullable()->comment('额外参数2');
			$table->integer('ordernum')->unsigned()->nullable()->comment('排序');
			$table->enum('disabled', array('true','false'))->nullable()->default('false');
			$table->unique(['p_region_id','region_grade','local_name'], 'ind_p_regions_id');
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
		Schema::drop('ectools_regions');
	}

}
