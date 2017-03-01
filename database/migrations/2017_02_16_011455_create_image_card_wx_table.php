<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageCardWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_card_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('image_id', true)->comment('图片ID');
			$table->char('image_type', 32)->comment('图片类型');
			$table->string('image_name', 50)->nullable()->comment('图片名称');
			$table->string('ident', 200)->nullable();
			$table->string('wx_url', 200)->comment('微信图片路径');
			$table->string('local_url', 200)->comment('本地图片路径');
			$table->integer('last_modified')->unsigned()->default(0)->comment('更新时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('image_card_wx');
	}

}
