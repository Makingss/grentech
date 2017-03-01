<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsAgreementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_agreement', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('agree_id')->comment('ID');
			$table->text('agreement', 65535)->comment('协议内容');
			$table->enum('agree_type', array('0'))->default('0')->comment('协议类型');
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
		Schema::drop('cps_agreement');
	}

}
