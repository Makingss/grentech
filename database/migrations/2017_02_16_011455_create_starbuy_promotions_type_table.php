<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuyPromotionsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_promotions_type', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('type_id')->comment('类型id');
			$table->string('name')->default('')->comment('类型名称');
			$table->enum('bydefault', array('true','false'))->nullable()->default('false')->comment('是否系统默认');
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
		Schema::drop('starbuy_promotions_type');
	}

}
