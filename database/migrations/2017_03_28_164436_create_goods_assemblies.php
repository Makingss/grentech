<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsAssemblies extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goodsassemblies', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('goods_id')->comment('商品ID');
			$table->integer('goodsassemblie_id');
			$table->string('goodsassemblie_type');
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
		Schema::dropIfExists('goodsassemblies');
	}
}
