<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_type', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('type_id')->comment('类型序号');
			$table->string('name', 100)->default('')->comment('类型名称');
			$table->enum('floatstore', array('0','1'))->default('0')->comment('小数型库存');
			$table->text('alias')->nullable()->comment('类型别名(|分隔,前后|)');
			$table->enum('is_physical', array('0','1'))->default('1')->comment('实体商品');
			$table->string('schema_id', 30)->default('custom')->comment('供应商序号');
			$table->text('setting')->nullable()->comment('类型设置');
			$table->text('price')->nullable()->comment('设置价格区间，用于列表页搜索使用');
			$table->text('minfo')->nullable()->comment('用户购买时所需输入信息的字段定义序列化数组方式 array(字段名,字段含义,类型(input,select,radio))');
			$table->text('params')->nullable()->comment('参数表结构(序列化) array(参数组名=>array(参数名1=>别名1|别名2,参数名2=>别名1|别名2))');
			$table->text('tab')->nullable()->comment('商品详情页的自定义tab设置');
			$table->enum('dly_func', array('0','1'))->default('0')->comment('是否包含发货函数');
			$table->enum('ret_func', array('0','1'))->default('0')->comment('是否包含退货函数');
			$table->enum('reship', array('disabled','func','normal','mixed'))->default('normal')->comment('退货方式 disabled:不允许退货 func:函数式');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->enum('is_def', array('true','false'))->default('false')->comment('是否系统默认');
			$table->integer('lastmodify')->unsigned()->nullable()->comment('上次修改时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_type');
	}

}
