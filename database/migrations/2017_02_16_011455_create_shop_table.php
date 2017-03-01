<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shop', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('shop_id', true)->comment('绑定联通表');
			$table->string('name')->comment('店铺名称');
			$table->string('node_id', 32)->nullable()->comment('店铺对应的中心证书的节点');
			$table->string('node_type', 128)->nullable()->comment('对方节点类型');
			$table->enum('status', array('bind','unbind'))->nullable()->default('unbind')->comment('绑定状态');
			$table->string('node_apiv', 8)->nullable()->comment('对方api版本');
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
		Schema::drop('shop');
	}

}
