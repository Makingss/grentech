<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_login_record', function (Blueprint $table) {
            $table->increments('id')->comment('用户登录记录表');
            $table->integer('member_id')->comment('用户权限外键');
            $table->char('ip', 64)->default('0.0.0.0')->comment('ip地址');
            $table->string('accuracy', 20)->nullable()->comment('精度');
            $table->string('latitude', 20)->nullable()->comment('纬度');
            $table->string('location', 100)->nullable()->comment('位置');
            $table->char('type', 2)->comment('类型');
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
        Schema::drop('member_login_record');
    }
}
