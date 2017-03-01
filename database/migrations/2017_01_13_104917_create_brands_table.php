<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.brand_tables'), function (Blueprint $table) {
            $table->increments('brand_id',11)->unsigned()->comment('品牌ID');
            $table->string('brand_name',50)->comment('品牌名称');
            $table->string('brand_url',255)->nullable()->commnet('品牌网址');
            $table->string('brand_logo',255)->nullable()->comment('品牌图片标识');
            $table->longText('brand_keywords')->nullable()->comment('品牌别名');
            $table->longText('brand_setting')->nullable()->comment('品牌设置');
            $table->enum('disabled',['false','true'])->comment('是否失效');
            $table->integer('p_order')->nullable()->comment('排序');
            $table->integer('last_modify')->nullable()->comment('更新时间');
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
        Schema::dropIfExists(config('dbschema.databases.brand_tables'));
    }
}
