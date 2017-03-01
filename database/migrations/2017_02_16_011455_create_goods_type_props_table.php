<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTypePropsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_type_props', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('props_id')->comment('属性序号');
			$table->integer('type_id')->unsigned()->index('ind_type_id')->comment('类型序号');
			$table->string('type', 20)->comment('展示类型');
			$table->string('search', 20)->default('select')->comment('搜索方式');
			$table->string('show', 10)->default('')->comment('是否显示');
			$table->string('name', 100)->default('')->comment('类型名称');
			$table->text('alias')->nullable()->comment('别名');
			$table->smallInteger('goods_p')->nullable()->comment('商品位置');
			$table->integer('ordernum')->nullable()->default(0)->comment('排序');
			$table->integer('lastmodify')->unsigned()->nullable()->comment('供应商最后更新时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_type_props');
	}

}
