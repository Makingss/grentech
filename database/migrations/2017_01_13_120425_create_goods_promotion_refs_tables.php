<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsPromotionRefsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_promotion_refs_tables'), function (Blueprint $table) {
            $table->increments('ref_id');
            $table->integer('goods_id')->unsigned()->comment('商品ID');
            $table->integer('rule_id')->unsigned()->comment('优惠规则ID');
            $table->integer('tag_id')->unsignet()->comment('促销标签ID');
            $table->longText('description')->nullable()->comment('规则描述');
            $table->string('member_lv_ids', 255)->nullable()->comment('会员级别集合');
            $table->string('apply_platform', 255)->nullable()->comment('活动平台');
            $table->integer('from_time')->unsigned()->nullable()->comment('起始时间');
            $table->integer('to_time')->unsigent()->nullable()->comment('截止时间');
            $table->enum('status', ['true', 'false'])->comment('状态');
            $table->enum('stop_rules_processing', ['true', 'false'])->comment('是否排斥其他规则');
            $table->integer('sort_order')->unsigned()->comment('优先级');
            $table->longText('action_solution')->comment('动作方案');
            $table->boolean('free_shipping')->nullable()->comment('免运费');
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
        Schema::dropIfExists(config('dbschema.databases.goods_promotion_refs_tables'));
    }
}
