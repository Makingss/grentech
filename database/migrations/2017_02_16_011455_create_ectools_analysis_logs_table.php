<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsAnalysisLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_analysis_logs', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('ectools统计日志ID');
			$table->integer('analysis_id')->unsigned()->index('ind_analysis_id')->comment('ectools统计ID');
			$table->integer('type')->unsigned()->default(0)->index('ind_type')->comment('类型');
			$table->integer('target')->unsigned()->default(0)->index('ind_target')->comment('指标');
			$table->integer('flag')->unsigned()->default(0)->comment('标识');
			$table->float('value', 10, 0)->default(0)->comment('数据');
			$table->integer('time')->unsigned()->index('ind_time')->comment('时间');
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
		Schema::drop('ectools_analysis_logs');
	}

}
