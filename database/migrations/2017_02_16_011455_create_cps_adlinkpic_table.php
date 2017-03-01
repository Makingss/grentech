<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsAdlinkpicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_adlinkpic', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('pic_id')->comment('图片ID');
			$table->integer('link_id')->unsigned()->default(0)->index('ind_link_id')->comment('推广链接ID');
			$table->text('remote_img_url', 65535)->comment('远程图片地址');
			$table->integer('width')->unsigned()->default(0)->comment('图片宽度');
			$table->integer('height')->unsigned()->default(0)->comment('图片高度');
			$table->string('suffix', 10)->default('')->comment('后缀');
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
		Schema::drop('cps_adlinkpic');
	}

}
