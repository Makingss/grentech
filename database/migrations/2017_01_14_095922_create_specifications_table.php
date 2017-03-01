<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('dbschema.databases.specifications_tables'), function (Blueprint $table) {
            $table->increments('spec_id')->comment('规格id');
            $table->string('spec_name', 50)->comment('规格名称');
            $table->enum('spec_show_type', ['select', 'flat'])->comment('显示方式 select:下拉;flat:平铺');
            $table->enum('spec_type', ['text', 'image'])->comment('类型 text:文字;image:图片');
            $table->string('spec_memo',255)->comment('规格备注');
            $table->integer('p_order')->default(0)->comment('排序');
            $table->enum('disabled',['true','false'])->comment('是否失效');
            $table->string('alias',255)->nullable()->comment('规格别名');
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
        Schema::dropIfExists(config('dbschema.databases.specifications_tables'));
    }
}
