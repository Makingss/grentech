<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_experience', function (Blueprint $table) {
            $table->increments('id')->comment('经验明细表');
            $table->integer('experience')->default('0')->comment('经验值');
            $table->smallInteger('change')->nullable()->comment('改变经验');
            $table->string('remark')->nullable()->comment('备注');
            $table->integer('member_id')->comment('外键用户ID');
            $table->string('source')->nullable()->comment('来源');
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
        Schema::drop('member_experience');
    }
}
