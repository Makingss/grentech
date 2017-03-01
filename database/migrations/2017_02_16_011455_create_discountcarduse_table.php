<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountcarduseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discountcarduse', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('id')->default('')->primary()->comment('卡券号');
			$table->integer('card_id')->unsigned()->comment('卡券id');
			$table->integer('member_id')->unsigned()->comment('会员ID');
			$table->enum('status', array('notenabled','invalid','alreadyused'))->nullable()->default('notenabled')->comment('状态');
			$table->integer('getdate')->unsigned()->nullable()->comment('领用时间');
			$table->integer('usedate')->unsigned()->nullable()->comment('使用时间');
			$table->string('remarks')->nullable()->comment('备注');
			$table->integer('agentid')->unsigned()->nullable()->comment('导购ID');
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
		Schema::drop('discountcarduse');
	}

}
