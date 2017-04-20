<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembberPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_permissions', function (Blueprint $table) {
            $table->increments('id')->comment('用户登录记录表');
            $table->string('name', 50)->comment('权限名称');
            $table->string('slug', 50)->comment('权限对应方法');
            $table->integer('order')->default(0)->comment('排序');
            $table->integer('parent_id')->default(0)->comment('排序关键字');
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
        Schema::drop('member_permissions');
    }
}
