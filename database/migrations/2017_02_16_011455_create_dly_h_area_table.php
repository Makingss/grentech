<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDlyHAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dly_h_area', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('dha_id');
			$table->integer('dt_id')->unsigned()->nullable();
			$table->integer('area_id')->unsigned()->nullable()->default(0);
			$table->string('price', 100)->nullable()->default('0');
			$table->boolean('has_cod')->default(0);
			$table->text('areaname_group')->nullable();
			$table->text('areaid_group')->nullable();
			$table->string('config')->nullable();
			$table->string('expressions')->nullable();
			$table->smallInteger('ordernum')->unsigned()->nullable();
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
		Schema::drop('dly_h_area');
	}

}
