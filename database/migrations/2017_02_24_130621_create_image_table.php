<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImageTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->char('image_id', 32)->primary()->comment('图片ID');
            $table->string('storage', 50)->default('filesystem')->comment('存储引擎');
            $table->string('image_name', 50)->nullable()->comment('图片名称');
            $table->string('ident', 200);
            $table->string('url', 200)->comment('网址');
            $table->string('l_ident', 200)->nullable()->comment('大图唯一标识');
            $table->string('l_url', 200)->nullable()->comment('大图URL地址');
            $table->string('m_ident', 200)->nullable()->comment('中图唯一标识');
            $table->string('m_url', 200)->nullable()->comment('中图URL地址');
            $table->string('s_ident', 200)->nullable()->comment('小图唯一标识');
            $table->string('s_url', 200)->nullable()->comment('小图URL地址');
            $table->integer('width')->unsigned()->nullable()->comment('宽度');
            $table->integer('height')->unsigned()->nullable()->comment('高度');
            $table->enum('watermark', array('true', 'false'))->nullable()->default('false')->comment('有水印');
            $table->text('build_size')->nullable()->comment('图片重构尺寸');
            $table->integer('last_modified')->unsigned()->default(0)->comment('更新时间');
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
        Schema::drop('image');
    }

}
