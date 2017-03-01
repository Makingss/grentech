<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spec_values', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('spec_value_id')->comment('规格值ID');
			$table->integer('spec_id')->unsigned()->default(0)->index('ind_spec_id')->comment('规格ID');
			$table->string('spec_value', 100)->default('')->comment('规格值');
			$table->string('alias')->nullable()->default('')->comment('规格别名');
			$table->char('spec_image', 32)->nullable()->default('')->comment('规格图片');
			$table->integer('p_order')->unsigned()->default(50)->comment('排序');
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
		Schema::drop('spec_values');
	}

}
