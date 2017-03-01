<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_users', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('u_id')->unsigned()->primary()->comment('ID');
			$table->string('u_name', 50)->default('')->index('ind_u_name')->comment('用户名');
			$table->string('realname', 100)->default('')->comment('联系人姓名');
			$table->string('mobile', 30)->default('')->comment('手机号码');
			$table->string('tel', 30)->default('')->comment('电话号码');
			$table->string('email', 200)->default('')->index('ind_email')->comment('邮箱');
			$table->integer('regtime')->unsigned()->default(0)->index('ind_regtime')->comment('注册时间');
			$table->string('reg_ip', 16)->default('')->comment('注册IP');
			$table->decimal('history_profit', 20)->default(0.00)->comment('历史佣金总额');
			$table->decimal('profit', 20)->default(0.00)->comment('尚未发放佣金');
			$table->enum('u_type', array('0','1'))->default('0')->comment('用户类型');
			$table->string('union_id', 10)->default('')->comment('联盟商推广ID');
			$table->string('question', 200)->default('')->comment('安全问题');
			$table->string('answer', 200)->default('')->comment('安全答案');
			$table->string('qq', 100)->default('')->comment('QQ');
			$table->string('msn', 100)->default('')->comment('MSN');
			$table->string('addr', 200)->default('')->comment('地址');
			$table->string('zipcode', 10)->default('')->comment('邮编');
			$table->string('identity_card', 20)->default('')->comment('身份证号码');
			$table->enum('state', array('0','1','2'))->default('1')->index('ind_state')->comment('审核状态');
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
		Schema::drop('cps_users');
	}

}
