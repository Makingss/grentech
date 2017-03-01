<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialCardWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('material_card_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->char('media_id', 60)->comment('素材编号id');
			$table->char('name', 100)->comment('素材文件名');
			$table->string('url', 200)->comment('url地址');
			$table->integer('update_time')->unsigned()->comment('更新时间');
			$table->enum('type', array('image','video','voice','news'))->comment('素材类型');
			$table->string('image_type', 200)->comment('素材类型');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('material_card_wx');
	}

}
