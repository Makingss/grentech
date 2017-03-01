<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberInvcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_invc', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('code_id', true)->comment('升级码ID');
			$table->integer('member_id')->unsigned()->default(0)->comment('会员ID');
			$table->integer('fx_mem_id')->unsigned()->default(0)->comment('下线ID');
			$table->integer('member_lv_id')->unsigned()->default(0)->comment('会员等级');
			$table->integer('member_agency_id')->unsigned()->default(0)->comment('代理商等级');
			$table->enum('member_type', array('1','2'))->nullable()->default('1')->comment('会员类型');
			$table->string('code')->nullable()->comment('升级码');
			$table->text('remark', 65535)->nullable()->comment('备注');
			$table->integer('time')->unsigned()->nullable()->comment('产生时间');
			$table->enum('has', array('true','false'))->default('true')->comment('登录第一次判断');
			$table->integer('edit_time')->unsigned()->nullable()->comment('修改时间');
			$table->enum('memc_isvalid', array('true','false'))->default('false')->comment('升级码是否当前可用');
			$table->enum('has_op', array('1','2','3'))->nullable()->default('1')->comment('审核状态');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_invc');
	}

}
