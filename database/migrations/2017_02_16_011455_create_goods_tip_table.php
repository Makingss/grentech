<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodsTipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goods_tip', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('tip_id')->comment('提示ID');
			$table->string('tip_name', 100)->default(' ')->comment('名称');
			$table->text('tip_text', 65535)->nullable()->comment('购物提示');
			$table->string('dt_ids')->nullable()->default('')->comment('配送方式');
			$table->string('payment_app_ids')->nullable()->default('')->comment('支付方式');
			$table->enum('need_idcard', array('true','false'))->nullable()->default('false')->comment('需身份证');
			$table->integer('amount_max')->unsigned()->nullable()->default(0)->comment('订单限额，0表示不限制');
			$table->integer('ordernum')->unsigned()->nullable()->default(50)->comment('排序');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goods_tip');
	}

}
