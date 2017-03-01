<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsAnalysisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_analysis', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ectools统计ID');
			$table->string('service', 100)->comment('对应的service');
			$table->enum('interval', array('hour','day','comment'));
			$table->integer('modify')->unsigned()->default(0)->comment('最后修改时间');
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
		Schema::drop('ectools_analysis');
	}

}
