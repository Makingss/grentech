<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsPromotionRefTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_promotion_ref', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('ref_id', true)->comment('商品与商品促销规则关联表');
			$table->bigInteger('goods_id')->unsigned()->default(0)->index('ind_goods_id')->comment('商品ID');
			$table->integer('rule_id')->default(0)->comment('优惠规则ID');
			$table->integer('tag_id')->unsigned()->default(0)->comment('促销标签id');
			$table->text('description', 65535)->nullable()->comment('规则描述');
			$table->string('member_lv_ids')->nullable()->default('')->comment('会员级别集合');
			$table->string('apply_platform')->nullable()->default('1,2')->comment('活动平台');
			$table->integer('from_time')->unsigned()->nullable()->default(0)->index('ind_from_time')->comment('起始时间');
			$table->integer('to_time')->unsigned()->nullable()->default(0)->index('ind_to_time')->comment('截止时间');
			$table->enum('status', array('true','false'))->default('false')->comment('状态');
			$table->enum('stop_rules_processing', array('true','false'))->default('false')->comment('是否排斥其他规则');
			$table->integer('sort_order')->unsigned()->default(0)->comment('优先级');
			$table->text('action_solution', 65535)->comment('动作方案');
			$table->boolean('free_shipping')->nullable()->default(0)->comment('免运费');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_promotion_ref');
	}

}
