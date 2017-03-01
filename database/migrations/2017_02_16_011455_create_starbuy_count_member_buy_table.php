<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarbuyCountMemberBuyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('starbuy_count_member_buy', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('cid');
			$table->integer('special_id')->unsigned()->nullable()->comment('规则id');
			$table->integer('product_id')->unsigned()->nullable()->comment('货品id');
			$table->integer('member_id')->unsigned()->nullable()->comment('会员id');
			$table->integer('count')->unsigned()->nullable()->comment('购买数量');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('starbuy_count_member_buy');
	}

}
