<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsLvPriceTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_lv_price', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('goods_id')->unsigned()->default(0)->index('index_goods_id')->comment('商品ID');
            $table->integer('product_id')->unsigned()->default(0)->index('index_product_id')->comment('货品ID');
            $table->integer('level_id')->unsigned()->default(0)->index('index_level_id')->comment('会员等级ID');
            $table->decimal('price', 20)->default(0.00)->comment('会员价');
            $table->primary(['goods_id', 'product_id', 'level_id']);
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
        Schema::drop('goods_lv_price');
    }

}
