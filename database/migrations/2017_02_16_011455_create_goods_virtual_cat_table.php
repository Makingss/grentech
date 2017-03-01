<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsVirtualCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_virtual_cat', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('virtual_cat_id')->comment('虚拟分类ID');
			$table->string('virtual_cat_name', 100)->default('')->comment('虚拟分类名称');
			$table->text('filter')->nullable()->comment('过滤条件');
			$table->text('addon')->nullable()->comment('额外序列化值');
			$table->integer('type_id')->nullable()->comment('商品类型ID');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled');
			$table->integer('parent_id')->unsigned()->nullable()->default(0)->comment('虚拟分类父ID');
			$table->integer('cat_id')->nullable()->comment('商品类别ID');
			$table->integer('p_order')->unsigned()->nullable()->index('ind_p_order')->comment('排序');
			$table->string('cat_path', 100)->nullable()->default(',')->index('ind_cat_path')->comment('类别路径(从根至本结点的路径,逗号分隔,首部有逗号) 序号(5位),类别号(6位):....');
			$table->integer('child_count')->unsigned()->nullable()->default(0)->comment('虚拟自分类数量');
			$table->string('url', 200)->default('')->comment('url');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_virtual_cat');
	}

}
