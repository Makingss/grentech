<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEctoolsArchiveOrderBillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ectools_archive_order_bills', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('rel_id')->unsigned()->default(0);
			$table->enum('bill_type', array('payments','refunds'))->default('payments')->comment('单据类型');
			$table->enum('pay_object', array('order','recharge','joinfee','prepaid_recharge'))->default('order')->comment('支付类型');
			$table->string('bill_id', 20)->comment('关联退款/付款单号');
			$table->decimal('money', 20)->nullable()->comment('金额');
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
		Schema::drop('ectools_archive_order_bills');
	}

}
