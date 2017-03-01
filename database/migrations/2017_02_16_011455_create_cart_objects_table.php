<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartObjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart_objects', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('obj_ident')->comment('对象ident');
			$table->string('member_ident', 50)->comment('会员ident,会员信息和serssion生成的唯一值');
			$table->integer('member_id')->default(-1)->index('ind_member_id')->comment('会员 id');
			$table->integer('store_id')->default(-1)->comment('店铺ID');
			$table->string('obj_type', 20)->comment('购物车对象类型');
			$table->text('params')->comment('购物车对象参数');
			$table->float('quantity', 10, 0)->unsigned()->comment('数量');
			$table->integer('time')->unsigned()->nullable()->comment('时间');
			$table->string('buy_code', 20)->nullable()->comment('分享人ID');
			$table->string('buy_url', 200)->nullable()->default('')->comment('推广URL');
			$table->bigInteger('parent_order_id')->unsigned()->nullable()->default(0)->comment('换货母订单号');
			$table->primary(['obj_ident','member_ident','member_id']);
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
		Schema::drop('cart_objects');
	}

}
