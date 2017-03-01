<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsUsermonthprofitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_usermonthprofit', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('ump_id')->comment('ID');
			$table->string('u_name', 50)->default('')->index('ind_u_name')->comment('用户名');
			$table->enum('state', array('1','2'))->default('1')->index('ind_state')->comment('发放状态');
			$table->decimal('money_sum', 20)->default(0.00)->comment('佣金总额');
			$table->decimal('cost_sum', 20)->default(0.00)->comment('订单总额');
			$table->integer('order_sum')->unsigned()->default(0)->comment('订单量');
			$table->integer('year')->unsigned()->default(1900)->index('ind_year')->comment('年份');
			$table->integer('month')->unsigned()->default(1)->comment('月份');
			$table->integer('u_id')->unsigned()->default(0)->index('ind_u_id')->comment('联盟商ID');
			$table->enum('disabled', array('false','true'))->default('false')->index('ind_disabled')->comment('是否有效');
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
		Schema::drop('cps_usermonthprofit');
	}

}
