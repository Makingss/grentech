<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMechanicsTemperatureAngleScience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mechanics', function (Blueprint $table) {
            $table->char('type', '2')->nullable()->comment('机械性能指标类型');
            $table->string('adjustmentrange', '20')->nullable()->comment('机械调整倾角范围(°)');
            $table->string('workingtemperature', '10')->nullable()->comment('工作温度(°C)');
            $table->string('gripdiameter', '20')->nullable()->comment('抱杆直径');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mechanics');
    }
}
