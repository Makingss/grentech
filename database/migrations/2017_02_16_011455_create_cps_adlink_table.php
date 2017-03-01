<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsAdlinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_adlink', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('link_id')->comment('ID');
			$table->string('url', 200)->default('')->comment('推广链接地址');
			$table->string('title', 200)->default('')->comment('链接标题');
			$table->integer('addtime')->unsigned()->default(0)->index('ind_addtime')->comment('添加时间');
			$table->enum('a_type', array('1','2'))->default('1')->comment('推广链接类型');
			$table->enum('disabled', array('false','true'))->default('false')->index('ind_disabled')->comment('是否有效');
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
		Schema::drop('cps_adlink');
	}

}
