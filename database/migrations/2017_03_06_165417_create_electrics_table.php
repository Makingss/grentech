<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->comment('产品');
            $table->integer('goods_id')->comment('商品');
            $table->string('workingband')->index()->comment('工作频段(MHz)');
            $table->string('x_beamwidth')->index()->comment('水平波瓣宽度');
            $table->string('y_beamwidth')->comment('垂直波瓣宽度');
            $table->string('beamgain')->index()->comment('波束增益(dBi)');
            $table->string('polarization')->nullable()->comment('极化方式');
            $table->string('dipangle')->nullable()->comment('下倾角');
            $table->string('xpd')->nullable()->comment('交叉极化鉴别率');
            $table->string('ratio')->nullable()->comment('前后比');
            $table->string('inhibition')->nullable()->comment('上旁瓣抑制');
            $table->string('voltagebobbi')->nullable()->comment('电压驻波比');
            $table->string('isolation')->nullable()->comment('端品隔离度');
            $table->string('imd3')->nullable()->comment('三阶交调');
            $table->string('impedance')->nullale()->comment('端口阻抗');
            $table->string('capacity')->nullable()->comment('功率容量');
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
        Schema::dropIfExists('electrics');
    }
}
