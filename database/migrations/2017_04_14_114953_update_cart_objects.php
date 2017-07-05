<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCartObjects extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cart_objects', function (Blueprint $table) {
			$table->integer('goods_id')->nullable()->comment('商品ID');
			$table->integer('product_id')->nullable()->comment('产品ID');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cart_objects', function (Blueprint $table) {
			//
		});
	}
}
