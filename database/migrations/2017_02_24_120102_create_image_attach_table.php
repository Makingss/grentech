<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageAttachTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_attach', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('attach_id')->comment('图片关联表ID');
            $table->bigInteger('target_id')->default(0)->comment('对象id-外键');
            $table->string('target_type', 20)->default('0')->comment('对象类型');
            $table->char('image_id', 32)->default(0)->comment('图片的主键-外键关联image表');
            $table->integer('last_modified')->unsigned()->default(0)->comment('更新时间');
            $table->index(['target_id', 'target_type'], 'index_1');
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
        Schema::drop('image_attach');
    }

}
