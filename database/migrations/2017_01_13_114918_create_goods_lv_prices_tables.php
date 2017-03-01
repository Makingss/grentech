<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsLvPricesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_lv_prices_tables'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->index('goods_id')->unsigned()->comment('商品ID');
            $table->integer('product_id')->index('product_id')->unsigned()->comment('货品ID');
            $table->integer('level_id')->index('level_id')->unsigned()->comment('会员等级');
            $table->decimal('price', 11, 3)->default(0)->comment('会员价');
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
        Schema::dropIfExists(config('dbschema.databases.goods_lv_prices_tables'));
    }
}
