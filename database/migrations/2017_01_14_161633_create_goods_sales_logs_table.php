<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSalesLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.goods_sales_logs_tables'), function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('log_id');
            $table->integer('member_id')->comment('会员ID');
            $table->unsignedBigInteger('order_id')->comment('订单号');
            $table->string('name', 50)->nullable()->comment('会员名称');
            $table->decimal('price', 11, 3)->nullable()->comment('价格');
            $table->integer('product_id')->unsigned()->comment('产品ID');
            $table->integer('goods_id')->unsigned()->comment('商品ID');
            $table->string('product_name', 255)->nullable()->comment('产品名称');
            $table->string('spec_info', 255)->nullable()->comment('商品规格');
            $table->integer('number')->nullable()->comment('购买数量');
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
        Schema::dropIfExists(config('dbschema.databases.goods_sales_logs_tables'));
    }

}
