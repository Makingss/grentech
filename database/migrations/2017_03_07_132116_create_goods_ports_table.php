<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_ports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->string('spec')->nullable();
            $table->string('ports_1')->nullable()->comment('-45° 7/16DIN阴头');
            $table->string('ports_2')->nullable()->comment('+45° 7/16DIN阴头');

            $table->string('ports_3')->nullable()->comment('4芯 集束电缆');
            $table->string('ports_4')->nullable()->comment('5芯 集束电缆');
            $table->string('ports_5')->nullable()->comment('N型阴头');
            $table->string('ports_6')->nullable()->comment('C');
            $table->string('ports_7')->nullable()->comment('900 -45°');
            $table->string('ports_8')->nullable()->comment('900 +45°');
            $table->string('ports_9')->nullable()->comment('1800 -45°');

            $table->string('ports_10')->nullable()->comment('1800 +45°');
            $table->string('ports_11')->nullable()->comment('D频段集束头');
            $table->string('ports_12')->nullable()->comment('FA频段集束头');
            $table->string('ports_13')->nullable()->comment('TDD N型阴头');
            $table->string('ports_15')->nullable()->comment('900 -45° 7/16DIN阴头');
            $table->string('ports_16')->nullable()->comment('900 +45° 7/16DIN阴头');
            $table->string('ports_17')->nullable()->comment('1800 -45° 7/16DIN阴头');
            $table->string('ports_18')->nullable()->comment('1800 +45° 7/16DIN阴头');
            $table->string('ports_19')->nullable()->comment('-45° N型阴头');
            $table->string('ports_20')->nullable()->comment('+45° N型阴头');

            $table->string('ports_21')->nullable()->comment('');
            $table->string('ports_22')->nullable()->comment('');
            $table->string('ports_23')->nullable()->comment('');
            $table->string('ports_24')->nullable()->comment('');
            $table->string('ports_25')->nullable()->comment('');
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
        Schema::dropIfExists('goods_ports');
    }
}
