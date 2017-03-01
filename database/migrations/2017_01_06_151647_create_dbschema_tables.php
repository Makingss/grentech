<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbschemaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_types_tables'), function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('type_id')->unsigned()->comment('类型ID');
            $table->string('name', 100)->unique()->comment('类型名称');
            $table->longText('type_alias')->nullable()->comment('类型别名(可以存多个别名)');
            $table->boolean('is_physical')->default(1)->comment('实体商品');
            $table->string('schema_id', 32)->nullable()->comment('供应商编号');
            $table->longText('setting')->comment('类型设置');
            $table->longText('price')->comment('设置价格区间,用于例表搜索使用');
            $table->longText('minfo')->nullable()->comment('用户购买时所需输入信息的字段定义序列化数组方式 array(字段名,字段含义,类型(input,select,radio))');
            $table->longText('params')->nullable()->comment('参数表结构(序列化) array(参数组名=>array(参数名1=>别名1|别名2,参数名2=>别名1|别名2))');
            $table->longText('tab')->nullable()->comment('商品详情页的自定义tab设置');
            $table->boolean('dly_func')->default(0)->comment('是否包含发货函数');
            $table->boolean('ret_func')->default(0)->comment('是否包含退货函数');
            $table->enum('reship', [
                    'disabled',//不支持退货
                    'func',//通过函数退货
                    'normal',//物流退货
                    'mixed'//物流退货+函数式动作
                ]
            )->default('normal')->comment('退货方式 disabled:不允许退货 func:函数式');
            $table->boolean('disabled')->default(false);
            $table->boolean('is_def')->default(false)->comment('类型标示,是否系统默认');
            $table->dateTime('schema_lastmodify')->nullable()->comment('供应商最后更新时间');
            $table->timestamps();
        });
        Schema::create(config('dbschema.databases.goods_cats_tables'), function (Blueprint $table) {
            $table->increments('cat_id')->unsigned()->comment('分类ID');
            $table->integer('parent_id')->unsigned()->comment('上级分类');
            $table->integer('type_id')->comment('类型序号');
            $table->string('name',50)->unique()->comment('分类名称');
            $table->boolean('is_leaf')->default(false)->comment('是否子节点');
            $table->longText('gallery_setting')->nullable()->comment('商品分类设置');
            $table->integer('disabled')->default(0)->comment('是否隐藏');
            $table->integer('p_order')->default(0)->comment('排序');
            $table->integer('goods_count')->default(0)->comment('商品数');
            $table->string('cat_path',200)->nullable()->comment('分类路径(从根至本结点的路径,逗号分隔,首部有逗号)');
            $table->timestamps();
        });
        Schema::create(config('dbschema.databases.goods_tables'), function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('goods_id')->unsigned()->comment('商品id');
            $table->string('jooge_goods_id', 200)->comment('商品id');
            $table->string('bn', 200)->unique()->comment('商品编号');
            $table->string('name', 255)->comment('商品名称');
            $table->integer('type_id')->unsigned()->comment('类型');
            //$table->foreign('type_id')->references('type_id')->on('goods_types')->comment('goods_type 外键约束');
            $table->integer('cat_id')->unsigned()->comment('分类');
            $table->integer('brand_id')->comment('品牌');
            $table->integer('marketable')->default(0)->comment('上下架');
            $table->integer('store')->unsigned()->default(0)->comment('库存');
            $table->integer('fav')->unsigned()->default(0)->nullable()->comment('收藏量');
            $table->integer('notify_num')->unsigned()->nullable()->default(0)->comment('缺货登记量');
            $table->dateTime('uptime')->nullable()->comment('上架时间');
            $table->dateTime('downtime')->nullable()->comment('下架时间');
            $table->integer('p_order')->default(30)->comment('排序');
            $table->integer('p_vstore')->default(30)->comment('店铺排序');
            $table->integer('d_order')->default(30)->comment('动态排序');
            $table->integer('d_vstore')->default(30)->comment('店铺动态排序');
            $table->integer('score')->default(0)->comment('积分');
            $table->decimal('cost_price')->unsigned()->default(0)->comment('成本价');
            $table->decimal('mkt_price')->unsigned()->default(0)->comment('市场价');
            $table->decimal('price')->unsigned()->default(0)->comment('销售价');
            $table->decimal('member_price')->unsigned()->default(0)->comment('会员价');
            $table->decimal('activity_price')->unsigned()->default(0)->comment('活动价');
            $table->decimal('weight')->nullable()->comment('重量');
            $table->decimal('g_weight')->nullable()->comment('净重');
            $table->integer('unit_id')->comment('单位');
            $table->text('brief')->nullable()->comment('商品简介');
            $table->enum('goods_sales_type', [
                'normal',
                'bind',
                'gift'
            ])->comment('销售类型');
            $table->string('image_default_id', 32)->comment('默认图片');
            $table->boolean('udfimg')->default(false)->comment('是否用户自定义图');
            $table->string('thumbnail_pic', 32)->nullable()->comment('缩略图');
            $table->string('small_pic', 32)->nullable()->comment('小图');
            $table->string('big_pic', 32)->nullable()->comment('大图');
            $table->integer('pic_id')->default(0)->comment('图片组');
            $table->text('intro')->nullable()->comment('祥细介绍');
            $table->string('store_place')->nullable()->comment('库位');
            $table->integer('min_buy')->nullable()->comment('起定量');
            $table->decimal('package_scale')->nullable()->comment('打包比例');
            $table->string('package_unit', 20)->nullable()->comment('打包单位');
            $table->boolean('package_use')->nullable()->comment('是否开启打包');
            $table->integer('store_prompt')->nullable()->comment('库存提示规则');
            $table->boolean('nostore_sell')->default(false)->comment('是否开启无库存销售');
            $table->longText('goods_setting')->comment('商品设置');
            $table->longText('spec_desc')->comment('货品规格');
            $table->longText('params')->comment('商品规则');
            $table->integer('visit_count')->default(0)->comment('被访问次数');
            $table->integer('comments_count')->default(0)->comment('评论次数');
            $table->integer('view_w_count')->default(0)->comment('周浏览次数');
            $table->integer('view_count')->default(0)->comment('浏览次数');
            $table->longText('count_stat')->nullable()->comment('统计数据');
            $table->integer('buy_count')->default(0)->comment('购买次数');
            $table->integer('buy_w_count')->default(0)->comment('周购买次数');
            $table->string('barcode')->default(0)->comment('条形码');
            $table->boolean('is_line')->default(false)->comment('是否为线上商品');//增加销售平台的逻辑
            $table->integer('fx_1_price')->default(0)->comment('一级佣金');
            $table->integer('fx_2_price')->default(0)->comment('二级佣金');
            $table->integer('fx_3_price')->default(0)->comment('三级佣金');
            $table->string('goods_status')->comment('商品状态');
            $table->string('modify_status')->nullable()->comment('变改标识');
            $table->dateTime('price_modify')->nullable()->comment('售价变更时间');
            $table->string('good_form')->nullable()->comment('商品来源');
            $table->integer('buy_limit')->nullable()->comment('商品限购数量');
            $table->string('taxrate')->nullable()->comment('税金');
            $table->integer('tip_id')->nullable()->comment('发货仓');
            $table->longText('pmt_tag')->nullable()->comment('标签');
            $table->integer('pmt_id')->default(0)->comment('促销方案');
            $table->decimal('goods_profit_ratio')->default(0)->comment('返佣比例');
            $table->boolean('is_pkg')->default(true)->comment('是否搭配商品');
            $table->longText('pkg_info')->nullable()->comment('搭配商品系列化信息');
            $table->timestamps();
        });
        Schema::create(config('dbschema.databases.products_tables'), function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id')->unsigned()->comment('货品ID');
            $table->string('jooge_product_id')->unique()->comment('货品ID');
            $table->string('name')->comment('货品名称');
            $table->integer('goods_id')->unsigned()->comment('商品ID');
            //$table->foreign('goods_id')->references('goods_id')->on('goods')->comment('goods 外键约束');
            $table->string('barcode')->unique()->comment('条形码');
            $table->string('title')->comment('标题');
            $table->string('bn', 32)->unique()->comment('货号');
            $table->decimal('cost_price')->unsigned()->default(0)->comment('成本价');
            $table->decimal('mkt_price')->unsigned()->default(0)->comment('市场价');
            $table->decimal('price')->unsigned()->default(0)->comment('销售价');
            $table->decimal('member_price')->unsigned()->default(0)->comment('会员价');
            $table->decimal('activity_price')->unsigned()->default(0)->comment('活动价');
            $table->integer('store')->default(0)->comment('库存');
            $table->string('store_place')->nullable()->comment('库位');
            $table->decimal('weight')->nullable()->comment('重量');
            $table->decimal('g_weight')->nullable()->comment('净重');
            $table->integer('unit_id')->unique()->comment('单位');
            $table->integer('freez')->default(0)->comment('冻结库存');
            $table->text('brief')->comment('商品简介');
            $table->enum('goods_type', [
                'normal',
                'bind',
                'gift'
            ])->comment('销售类型');
            $table->string('spec_info')->comment('产品描述');
            $table->longText('spec_desc')->comment('产品规格');
            $table->boolean('is_default')->default(false)->commnet('is_default');
            $table->string('qrcode_image_id')->nullable()->comment('二维码图片');
            $table->dateTime('uptime')->comment('产品录入时间');
            $table->boolean('disabled')->default(false)->comment('是否失效');
            $table->boolean('marketable')->default(true)->comment('上架');
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
        Schema::dropIfExists(config('dbschema.databases.goods_tables'));
        Schema::dropIfExists(config('dbschema.databases.products_tables'));
        Schema::dropIfExists(config('dbschema.databases.goods_types_tables'));
        Schema::dropIfExists(config('dbschema.databases.goods_cats_tables'));
    }
}
