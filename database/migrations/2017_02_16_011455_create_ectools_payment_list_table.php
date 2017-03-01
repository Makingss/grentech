<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsPaymentListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_payment_list', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('list_id', true)->comment('序号');
			$table->string('account', 50)->nullable()->comment('收款账号');
			$table->string('bank', 50)->nullable()->comment('收款银行');
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
		Schema::drop('ectools_payment_list');
	}

}
