<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standardfits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->commit('商品');
            $table->integer('bracket')->nullable()->comment('底部支架');
            $table->integer('expansionbolt')->nullable()->comment('膨胀螺栓');
            $table->integer('hexagonbolt')->nullable()->comment('外六角螺栓');
            $table->integer('lightning')->nullable()->comment('避雷针');
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
        Schema::dropIfExists('standardfits');
    }
}
