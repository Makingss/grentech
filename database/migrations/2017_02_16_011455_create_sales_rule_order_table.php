<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesRuleOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_rule_order', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('rule_id', true)->comment('规则id');
			$table->string('name')->default('')->comment('规则名称');
			$table->text('description', 65535)->nullable()->comment('规则描述');
			$table->integer('from_time')->unsigned()->nullable()->default(0)->comment('起始时间');
			$table->integer('to_time')->unsigned()->nullable()->default(0)->comment('截止时间');
			$table->string('member_lv_ids')->default('')->comment('会员级别集合');
			$table->enum('status', array('true','false'))->default('false')->comment('开启状态');
			$table->text('conditions')->comment('规则条件');
			$table->text('action_conditions')->nullable()->comment('动作执行条件');
			$table->enum('stop_rules_processing', array('true','false'))->default('false')->comment('是否排斥');
			$table->integer('sort_order')->unsigned()->default(0)->comment('优先级');
			$table->text('action_solution')->comment('动作方案');
			$table->enum('free_shipping', array('0','1','2'))->nullable()->default('0')->comment('免运费');
			$table->enum('rule_type', array('N','C'))->default('N');
			$table->string('c_template', 100)->nullable()->comment('过滤条件模板');
			$table->string('s_template')->nullable()->comment('优惠方案模板');
			$table->string('apply_platform')->nullable()->default('1,2')->comment('活动平台');
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
		Schema::drop('sales_rule_order');
	}

}
