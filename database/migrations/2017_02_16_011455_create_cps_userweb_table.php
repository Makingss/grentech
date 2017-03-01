<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsUserwebTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_userweb', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('web_id')->comment('ID');
			$table->integer('u_id')->unsigned()->default(0)->index('ind_u_id')->comment('联盟商推广ID');
			$table->string('webname', 100)->default('')->comment('网站名称');
			$table->enum('webtype', array('0','1','2','3','4','5'))->default('0')->comment('网站类型');
			$table->text('weburl', 65535)->comment('网站地址');
			$table->string('webinfo', 1000)->default('')->comment('网站简介');
			$table->string('visits', 100)->default('')->comment('访问量');
			$table->string('alex_rank', 100)->default('')->comment('积分');
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
		Schema::drop('cps_userweb');
	}

}
