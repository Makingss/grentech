<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIdcardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('idcard', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('身份证记录id');
			$table->integer('member_id')->nullable()->comment('会员ID');
			$table->string('real_name', 50)->nullable()->comment('会员真实姓名');
			$table->string('card_num', 50)->nullable()->comment('身份证号');
			$table->unique(['member_id','card_num'], 'ind_date_mid');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('idcard');
	}

}
