<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsBankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_bank', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('b_id')->comment('ID');
			$table->string('b_name', 100)->default('')->comment('银行名称');
			$table->enum('is_use', array('false','true'))->default('true')->index('ind_is_use')->comment('是否启用');
			$table->enum('disabled', array('false','true'))->default('false')->index('ind_disabled')->comment('是否有效');
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
		Schema::drop('cps_bank');
	}

}
