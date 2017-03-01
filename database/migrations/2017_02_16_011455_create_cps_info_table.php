<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_info', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('info_id')->comment('ID');
			$table->string('title', 200)->default('')->comment('文章标题');
			$table->enum('ifpub', array('false','true'))->default('false')->index('ind_ifpub')->comment('发布状态');
			$table->integer('pubtime')->unsigned()->default(0)->index('ind_pubtime')->comment('发布时间');
			$table->enum('i_type', array('1','2'))->default('1')->index('ind_i_type')->comment('文章类型');
			$table->text('content', 65535)->comment('文章内容');
			$table->enum('disabled', array('false','true'))->default('true')->index('ind_disabled')->comment('是否有效');
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
		Schema::drop('cps_info');
	}

}
