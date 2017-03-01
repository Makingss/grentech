<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCounterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('counter', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('counter_id')->comment('ID');
			$table->string('counter_type', 50)->comment('类型');
			$table->string('counter_name', 30)->nullable()->comment('计数器名');
			$table->index(['counter_type','counter_name'], 'uni_value');
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
		Schema::drop('counter');
	}

}
