<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddsElectrics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('electrics', function (Blueprint $table) {
            //通用参数
            $table->string('dipangleaccuracy')->nullable()->comment('电下倾角精度(°)');

            //校准与电气参数
            $table->string('calibration_1')->nullable()->comment('校准端口至各辐射端口的耦合度(°)');
            $table->string('calibration_2')->nullable()->comment('校准端口至各辐射端口幅度最大偏差(dB)');
            $table->string('calibration_3')->nullable()->comment('校准端口至各辐射端口的相位最大偏差(°)');
            $table->string('calibration_4')->nullable()->comment('校准端口及辐射端口电压驻波比');

            //同极化辐射端口间的隔离度(dB)
            $table->string('withcalibration_1')->nullable()->comment('(2°下倾)');
            $table->string('withcalibration_2')->nullable()->comment('(3~6°下倾)');
            $table->string('withcalibration_3')->nullable()->comment('(7~12°下倾)');

            //异极化辐射端口间的隔离度(dB)
            $table->string('differentcalibration_1')->nullable()->comment('(2°下倾)');
            $table->string('differentcalibration_2')->nullable()->comment('(3~6°下倾)');
            $table->string('differentcalibration_3')->nullable()->comment('(7~12°下倾)');

            //辐射参数 - 单元波束
            $table->string('cellbeam_1')->nullable()->comment('水平面半功率波束宽度(°)');
            $table->string('cellbeam_2')->nullable()->comment('单元波束增益(dBi)');
            $table->string('cellbeam_3')->nullable()->comment('波束±60°边缘功率下降(dB)');

            $table->string('cellbeam_4')->nullable()->comment('垂直面半功率波束宽度(°)');
            $table->string('cellbeam_5')->nullable()->comment('交叉极化比（轴向）(dB)');
            $table->string('cellbeam_6')->nullable()->comment('交叉极化比（±60°）(dB)');
            $table->string('cellbeam_7')->nullable()->comment('前后比');
            $table->string('cellbeam_8')->nullable()->comment('上旁瓣抑制(dB)');

            //辐射参数 - 广播波束
            $table->string('radiobeam_1')->nullable()->comment('水平面半功率波束宽度(°)');
            $table->string('radiobeam_2')->nullable()->comment('广播波束增益(dBi)');
            $table->string('radiobeam_3')->nullable()->comment('波束±60°边缘功率下降(dB)');
            $table->string('radiobeam_4')->nullable()->comment('垂直面半功率波束宽度(°)');
            $table->string('radiobeam_5')->nullable()->comment('交叉极化比（轴向）(dB)');
            $table->string('radiobeam_6')->nullable()->comment('交叉极化比（±20°,参考）(dB)');
            $table->string('radiobeam_7')->nullable()->comment('交叉极化比（±60°）(dB)');
            $table->string('radiobeam_8')->nullable()->comment('前后比');
            $table->string('radiobeam_9')->nullable()->comment('上旁瓣抑制(dB)');
            $table->string('radiobeam_10')->nullable()->comment('下部第一零点填充（参考）(dB)');

            //辐射参数 - 业务波束
            $table->string('businessbeam_1')->nullable()->comment('0°指向波束增益(dBi)');
            $table->string('businessbeam_2')->nullable()->comment('0°指向波束水平半功率角宽度(°)');
            $table->string('businessbeam_3')->nullable()->comment('0°指向波束水平副瓣电平(dB)');
            $table->string('businessbeam_4')->nullable()->comment('±60°指向波束增益(dBi)');
            $table->string('businessbeam_5')->nullable()->comment('±60°指向波束水平半功率角宽度(°)');
            $table->string('businessbeam_6')->nullable()->comment('±60°指向波束水平副瓣电平(dB)');
            $table->string('businessbeam_7')->nullable()->comment('0°交叉极化比（轴向）(dB)');
            $table->string('businessbeam_8')->nullable()->comment('0°前后比');

            //
//            $table->string('impedance')->nullable()->comment('输入阻抗（Ω）');
            //
            $table->string('unitport')->nullable()->comment('单元端口(W)');
            $table->string('calibrationport')->nullable()->comment('校准端口(W)');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('electrics', function (Blueprint $table) {
            //
        });
    }
}
