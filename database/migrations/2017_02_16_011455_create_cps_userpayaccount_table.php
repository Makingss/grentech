<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsUserpayaccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_userpayaccount', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('u_id')->unsigned()->primary()->comment('ID');
			$table->string('account', 100)->comment('开户账号');
			$table->string('acc_bank', 100)->comment('开户银行');
			$table->string('acc_bname', 100)->comment('支行名称');
			$table->string('acc_cname', 100)->default('')->comment('公司名称');
			$table->string('acc_person', 50)->default('')->comment('开户人姓名');
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
		Schema::drop('cps_userpayaccount');
	}

}
