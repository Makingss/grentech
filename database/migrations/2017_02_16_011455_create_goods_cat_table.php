<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_cat', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('cat_id')->comment('分类ID');
			$table->integer('parent_id')->unsigned()->nullable()->comment('分类ID');
			$table->string('cat_path', 100)->nullable()->default(',')->index('ind_cat_path')->comment('分类路径(从根至本结点的路径,逗号分隔,首部有逗号)');
			$table->enum('is_leaf', array('true','false'))->default('false')->comment('是否叶子结点（true：是；false：否）');
			$table->integer('type_id')->nullable()->comment('类型序号');
			$table->string('cat_name', 100)->default('')->comment('分类名称');
			$table->text('gallery_setting')->nullable()->comment('商品分类设置');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled')->comment('是否屏蔽（true：是；false：否）');
			$table->integer('p_order')->unsigned()->nullable()->default(0)->comment('排序');
			$table->integer('goods_count')->unsigned()->nullable()->comment('商品数');
			$table->text('tabs')->nullable()->comment('子视图');
			$table->text('finder')->nullable()->comment('渐进式筛选容器');
			$table->text('addon')->nullable()->comment('附加项');
			$table->integer('child_count')->unsigned()->default(0)->comment('子类别数量');
			$table->integer('last_modify')->unsigned()->nullable()->index('ind_last_modify')->comment('更新时间');
			$table->string('picture')->nullable()->comment('图片标志');
			$table->string('picture2')->nullable()->comment('图片标志2');
			$table->float('cat_profit_ratio', 10, 0)->nullable()->default(0)->comment('返佣比例');
			$table->integer('from_time')->unsigned()->nullable()->comment('活动开始时间');
			$table->integer('to_time')->unsigned()->nullable()->comment('活动结束时间');
			$table->enum('is_starbuy', array('0','1'))->nullable()->default('0')->comment('是否激活');
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
		Schema::drop('goods_cat');
	}

}
