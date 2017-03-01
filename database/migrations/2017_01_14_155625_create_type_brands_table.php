<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.type_brands_tables'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->index()->unsigned()->comment('商品类型ID');
            $table->integer('brand_id')->index()->unsigned()->comment('品牌ID');
            $table->integer('p_order')->nullable()->comment('排序');
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
        Schema::dropIfExists(config('dbschema.databases.type_brands_tables'));
    }
}
