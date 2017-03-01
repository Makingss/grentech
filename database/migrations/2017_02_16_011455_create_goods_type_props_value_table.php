<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTypePropsValueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_type_props_value', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('props_value_id')->comment('属性值序号');
			$table->integer('props_id')->unsigned()->index('ind_props_id')->comment('属性序号');
			$table->string('name', 100)->default('')->comment('类型名称');
			$table->integer('order_by')->default(0)->comment('排序');
			$table->string('alias')->default('')->comment('别名');
			$table->integer('lastmodify')->unsigned()->nullable()->comment('最后更新时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_type_props_value');
	}

}
