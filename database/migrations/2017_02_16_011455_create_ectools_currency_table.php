<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsCurrencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_currency', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('cur_id', true)->comment('货币ID');
			$table->string('cur_name', 20)->default('')->comment('货币名称');
			$table->string('cur_sign', 5)->nullable()->comment('货币符号');
			$table->string('cur_code', 8)->default('')->unique('uni_ident_type')->comment('货币代码');
			$table->decimal('cur_rate', 10, 4)->default(1.0000)->comment('汇率');
			$table->enum('cur_default', array('true','false'))->default('false')->comment('默认货币');
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
		Schema::drop('ectools_currency');
	}

}
