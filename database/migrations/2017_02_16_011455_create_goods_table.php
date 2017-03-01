<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('goods_id', true)->unsigned()->comment('商品ID');
			$table->string('jooge_goods_id', 200)->comment('商品ID');
			$table->string('bn', 200)->nullable()->unique('uni_bn')->comment('商品编号');
			$table->string('name', 200)->default('')->comment('商品名称');
			$table->decimal('price', 20)->default(0.00)->comment('销售价');
			$table->integer('type_id')->unsigned()->nullable()->comment('类型');
			$table->integer('cat_id')->unsigned()->default(0)->comment('分类');
			$table->integer('brand_id')->unsigned()->nullable()->comment('品牌');
			$table->integer('marketable')->default(0)->index('idx_marketable')->comment('上架');
			$table->integer('store')->unsigned()->nullable()->default(0)->comment('库存');
			$table->integer('fav')->unsigned()->nullable()->default(0)->comment('收藏量');
			$table->integer('notify_num')->unsigned()->default(0)->comment('缺货登记');
			$table->integer('uptime')->unsigned()->nullable()->comment('上架时间');
			$table->integer('downtime')->unsigned()->nullable()->comment('下架时间');
			$table->integer('last_modify')->unsigned()->nullable()->comment('更新时间');
			$table->integer('p_order')->unsigned()->default(30)->comment('排序');
			$table->integer('sortnum')->default(999999999)->comment('V店排序');
			$table->integer('d_order')->unsigned()->default(30)->index('idx_d_order')->comment('动态排序');
			$table->integer('score')->unsigned()->nullable()->comment('积分');
			$table->decimal('cost', 20)->default(0.00)->comment('成本价');
			$table->decimal('mktprice', 20)->nullable()->comment('市场价');
			$table->decimal('weight', 20, 3)->nullable()->comment('重量');
			$table->decimal('g_weight', 20, 3)->nullable()->comment('净重');
			$table->string('unit', 20)->nullable()->comment('单位');
			$table->string('brief')->nullable()->comment('商品简介');
			$table->enum('goods_type', array('normal','bind','gift'))->default('normal')->index('idx_goods_type')->comment('销售类型');
			$table->string('image_default_id', 32)->nullable()->comment('默认图片');
			$table->enum('udfimg', array('true','false'))->nullable()->default('false')->comment('是否用户自定义图');
			$table->string('thumbnail_pic', 32)->nullable()->comment('缩略图');
			$table->string('small_pic')->nullable()->comment('小图');
			$table->string('big_pic')->nullable()->comment('大图');
			$table->text('intro')->nullable()->comment('详细介绍');
			$table->string('store_place')->nullable()->comment('库位');
			$table->integer('min_buy')->unsigned()->nullable()->comment('起定量');
			$table->decimal('package_scale', 20)->nullable()->comment('打包比例');
			$table->string('package_unit', 20)->nullable()->comment('打包单位');
			$table->enum('package_use', array('0','1'))->nullable()->comment('是否开启打包');
			$table->enum('score_setting', array('percent','number'))->nullable()->default('number');
			$table->integer('store_prompt')->unsigned()->nullable()->comment('库存提示规则');
			$table->enum('nostore_sell', array('0','1'))->nullable()->default('0')->comment('是否开启无库存销售');
			$table->text('goods_setting')->nullable()->comment('商品设置');
			$table->text('spec_desc')->nullable()->comment('货品规格序列化');
			$table->text('params')->nullable()->comment('商品规格序列化');
			$table->enum('disabled', array('true','false'))->default('false');
			$table->integer('rank_count')->unsigned()->default(0)->comment('google page rank count');
			$table->integer('comments_count')->unsigned()->default(0)->comment('评论次数');
			$table->integer('view_w_count')->unsigned()->default(0)->comment('周浏览次数');
			$table->integer('view_count')->unsigned()->default(0)->comment('浏览次数');
			$table->text('count_stat')->nullable()->comment('统计数据序列化');
			$table->integer('buy_count')->unsigned()->default(0)->comment('购买次数');
			$table->integer('buy_w_count')->unsigned()->default(0)->comment('购买次数');
			$table->string('barcode', 200)->default('0')->comment('条形码');
			$table->string('wx_image_id', 32)->nullable()->comment('微信商品图片');
			$table->string('ipad_image_id', 32)->nullable()->comment('Ipad商品图片');
			$table->enum('is_line', array('0','1'))->nullable()->default('0')->comment('是否为线上商品');
			$table->string('fx_1_price', 32)->nullable()->default('0')->comment('一级佣金');
			$table->string('fx_2_price', 32)->nullable()->default('0')->comment('二级佣金');
			$table->string('fx_3_price', 32)->nullable()->default('0')->comment('三级佣金');
			$table->integer('p_1')->unsigned()->nullable()->index('ind_p_1');
			$table->integer('p_2')->unsigned()->nullable()->index('ind_p_2');
			$table->integer('p_3')->unsigned()->nullable()->index('ind_p_3');
			$table->integer('p_4')->unsigned()->nullable()->index('ind_p_4');
			$table->integer('p_5')->unsigned()->nullable()->index('ind_p_5');
			$table->integer('p_6')->unsigned()->nullable()->index('ind_p_6');
			$table->integer('p_7')->unsigned()->nullable()->index('ind_p_7');
			$table->integer('p_8')->unsigned()->nullable()->index('ind_p_8');
			$table->integer('p_9')->unsigned()->nullable()->index('ind_p_9');
			$table->integer('p_10')->unsigned()->nullable()->index('ind_p_10');
			$table->integer('p_11')->unsigned()->nullable()->index('ind_p_11');
			$table->integer('p_12')->unsigned()->nullable()->index('ind_p_12');
			$table->integer('p_13')->unsigned()->nullable()->index('ind_p_13');
			$table->integer('p_14')->unsigned()->nullable()->index('ind_p_14');
			$table->integer('p_15')->unsigned()->nullable()->index('ind_p_15');
			$table->integer('p_16')->unsigned()->nullable()->index('ind_p_16');
			$table->integer('p_17')->unsigned()->nullable()->index('ind_p_17');
			$table->integer('p_18')->unsigned()->nullable()->index('ind_p_18');
			$table->integer('p_19')->unsigned()->nullable()->index('ind_p_19');
			$table->integer('p_20')->unsigned()->nullable()->index('ind_p_20');
			$table->string('p_21')->nullable()->index('ind_p_21');
			$table->string('p_22')->nullable()->index('ind_p_22');
			$table->string('p_23')->nullable()->index('ind_p_23');
			$table->string('p_24')->nullable()->index('ind_p_24');
			$table->string('p_25')->nullable()->index('ind_p_25');
			$table->string('p_26')->nullable()->index('ind_p_26');
			$table->string('p_27')->nullable()->index('ind_p_27');
			$table->string('p_28')->nullable()->index('ind_p_28');
			$table->string('p_29')->nullable()->index('ind_p_29');
			$table->string('p_30')->nullable()->index('ind_p_30');
			$table->string('p_31')->nullable()->index('ind_p_31');
			$table->string('p_32')->nullable()->index('ind_p_32');
			$table->string('p_33')->nullable()->index('ind_p_33');
			$table->string('p_34')->nullable()->index('ind_p_34');
			$table->string('p_35')->nullable()->index('ind_p_35');
			$table->string('p_36')->nullable()->index('ind_p_36');
			$table->string('p_37')->nullable()->index('ind_p_37');
			$table->string('p_38')->nullable()->index('ind_p_38');
			$table->string('p_39')->nullable()->index('ind_p_39');
			$table->string('p_40')->nullable()->index('ind_p_40');
			$table->string('p_41')->nullable()->index('ind_p_41');
			$table->string('p_42')->nullable()->index('ind_p_42');
			$table->string('p_43')->nullable()->index('ind_p_43');
			$table->string('p_44')->nullable()->index('ind_p_44');
			$table->string('p_45')->nullable()->index('ind_p_45');
			$table->string('p_46')->nullable()->index('ind_p_46');
			$table->string('p_47')->nullable()->index('ind_p_47');
			$table->string('p_48')->nullable()->index('ind_p_48');
			$table->string('p_49')->nullable()->index('ind_p_49');
			$table->string('p_50')->nullable()->index('ind_p_50');
			$table->string('goods_status', 32)->nullable()->default('0')->comment('商品状态');
			$table->string('modify_status', 32)->nullable()->default('0')->comment('变更标识');
			$table->string('price_modify')->nullable()->comment('售价变更日期');
			$table->string('good_form', 32)->nullable()->comment('商品来源');
			$table->integer('buy_limit')->unsigned()->nullable()->default(0)->comment('商品限购数量');
			$table->string('taxrate', 32)->nullable()->comment('税');
			$table->integer('tip_id')->unsigned()->default(0)->comment('发货仓');
			$table->string('pmt_text', 32)->nullable()->default('')->comment('促销标志文字');
			$table->string('pmt_color', 32)->nullable()->comment('促销标志背景色');
			$table->float('goods_profit_ratio', 10, 0)->nullable()->default(0)->comment('返佣比例');
			$table->enum('is_pkg', array('0','1'))->default('0')->comment('是否搭配商品');
			$table->text('pkg_info')->nullable()->comment('搭配商品系列化信息');
			$table->integer('from_time')->unsigned()->nullable()->comment('活动开始时间');
			$table->integer('to_time')->unsigned()->nullable()->comment('活动结束时间');
			$table->enum('is_starbuy', array('0','1'))->nullable()->default('0')->comment('是否激活');
			$table->integer('rule_id')->unsigned()->default(0)->comment('活动ID');
			$table->index(['disabled','goods_type','marketable'], 'ind_frontend');
			$table->index(['goods_type','d_order'], 'idx_goods_type_d_order');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods');
	}

}
