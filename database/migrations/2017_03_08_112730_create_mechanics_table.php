<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMechanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->string('jointtype')->nullable()->comment('接头类型');
            $table->string('antennasize')->nullable()->comment('天线尺寸(mm)');
            $table->string('antennanumber')->nullable()->comment('内含天线数');
            $table->string('x_range')->nullable()->comment('水平可调角范围(°)');
            $table->string('antennanweight')->nullable()->comment('天线重量(kg)');
            $table->string('guardmode')->nullable()->comment('雷电保护方式');
            $table->string('installmodel')->nullable()->comment('安装方式');
            $table->string('maintainmodel')->nullable()->comment('维护方式');
            $table->string('antennandata')->nullable()->comment('天线罩材料');
            $table->string('surfacing')->nullable()->comment('外罩表面处理');
            $table->string('antennanageing')->nullable()->comment('天线外罩抗老化');
            $table->string('temperature')->nullable()->comment('环境温度(°)');
            $table->string('limittemperature')->nullable()->comment('极限温度(°)');

            $table->string('relativehumidity')->nullable()->comment('相对温度');
            $table->string('atmos')->nullable()->comment('大气压(kpa)');
            $table->string('speed')->nullable()->comment('工作风速(km/h)');
            $table->string('limitspeed')->nullable()->comment('极限风速(km/h)');

            $table->string('thickness')->nullable()->comment('摄冰厚度');
            $table->string('flameretardant')->nullable()->comment('天线外罩阻燃性');
            $table->string('ultraviolet')->nullable()->comment('防紫外线');
            $table->string('PH')->nullable()->comment('耐酸碱度');
            $table->string('protect')->nullable()->comment('防护等级');
            $table->string('other')->nullable()->comment('其它要求');
            $table->string('exposed')->nullable()->comment('外露金属件');

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
        Schema::dropIfExists('mechanics');
    }
}
