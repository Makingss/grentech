<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountcardtypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discountcardtype', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('序号');
			$table->string('typename')->comment('类型名称');
			$table->string('remarks')->nullable()->comment('备注');
			$table->string('url_pic')->nullable()->comment('说明');
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
		Schema::drop('discountcardtype');
	}

}
