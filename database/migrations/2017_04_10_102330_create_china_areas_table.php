<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChinaAreasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('china_areas', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('value');
			$table->integer('parent')->unsigend()->default(0)->index();
			$table->string('name')->nullable();
			$table->tinyInteger('type')->index();
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
		Schema::dropIfExists('china_areas');
	}
}
