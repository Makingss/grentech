<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTypeSpecTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_type_spec', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('spec_id')->unsigned()->default(0)->comment('规格ID');
			$table->integer('type_id')->unsigned()->default(0)->comment('类型ID');
			$table->enum('spec_style', array('select','flat','disabled'))->default('flat')->comment('渐进式搜索时的样式');
			$table->integer('ordernum')->unsigned()->default(0);
			$table->primary(['spec_id','type_id']);$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_type_spec');
	}

}
