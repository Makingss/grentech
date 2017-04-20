<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberPointConfigure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_point_configure', function (Blueprint $table) {
            $table->increments('id')->comment('积分配置表');
            $table->string('name', 60)->comment('积分名称');
            $table->integer('base')->comment('权限基数');
            $table->timestamp('startDate')->nullable()->comment('开始时间');
            $table->timestamp('endDate')->nullable()->comment('结束时间');
            $table->integer('expires_in')->default('-2')->comment('失效时间，默认-2:永久');
            $table->string('remark')->nullable()->comment('备注');
            $table->char('status')->nullable()->default('1')->comment('默认:1 开启 0 关闭');
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
        Schema::drop('member_point_configure');
    }
}
