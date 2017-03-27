<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGoods extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('goods', function (Blueprint $table) {
			$table->string('product_model')->nullable()->comment('产品型号');
			$table->string('product_desc')->nullable()->comment('产品描述');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('goods', function (Blueprint $table) {
			//
		});
	}
}
