<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('记录ID');
			$table->integer('member_id')->unsigned()->nullable()->comment('收款人id');
			$table->string('name', 50)->nullable()->comment('付款人姓名');
			$table->string('mobile', 20)->nullable()->comment('联系方式');
			$table->string('address', 100)->nullable()->comment('地址');
			$table->decimal('total', 20)->nullable()->comment('支付金额');
			$table->integer('last_modify')->unsigned()->nullable()->comment('支付时间');
			$table->boolean('is_read')->nullable()->default(0)->comment('是否已读');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('message');
	}

}
