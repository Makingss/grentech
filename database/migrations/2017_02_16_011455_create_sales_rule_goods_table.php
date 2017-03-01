<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesRuleGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_rule_goods', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('rule_id', true)->comment('规则id');
			$table->integer('article_id')->nullable()->comment('文章id');
			$table->string('name')->default('')->comment('规则名称');
			$table->string('c_image_url', 32)->comment('封面图片');
			$table->text('description', 65535)->nullable()->comment('规则描述');
			$table->integer('create_time')->unsigned()->nullable()->comment('修改时间');
			$table->integer('from_time')->unsigned()->nullable()->default(0)->index('ind_from_time')->comment('起始时间');
			$table->integer('to_time')->unsigned()->nullable()->default(0)->index('ind_to_time')->comment('截止时间');
			$table->string('member_lv_ids')->nullable()->default('')->comment('会员级别集合');
			$table->enum('status', array('true','false'))->default('false')->comment('开启状态');
			$table->text('conditions')->comment('规则条件');
			$table->enum('stop_rules_processing', array('true','false'))->default('false')->comment('是否排斥');
			$table->integer('sort_order')->unsigned()->default(0)->comment('优先级');
			$table->text('action_solution')->comment('动作方案');
			$table->boolean('free_shipping')->nullable()->default(0)->comment('免运费');
			$table->string('c_template', 100)->nullable()->comment('过滤条件模板');
			$table->string('s_template', 100)->nullable()->comment('优惠方案模板');
			$table->integer('apply_time')->unsigned()->nullable()->comment('预过滤时间');
			$table->string('apply_platform')->nullable()->default('1,2')->comment('活动平台');
			$table->text('presell')->comment('活动中的预售商品');
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
		Schema::drop('sales_rule_goods');
	}

}
