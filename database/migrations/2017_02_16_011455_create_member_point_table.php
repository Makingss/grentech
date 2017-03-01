<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_point', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('积分日志ID');
			$table->integer('member_id')->unsigned()->default(0)->index('ind_member_id')->comment('会员ID');
			$table->integer('point')->default(0)->comment('积分阶段总结');
			$table->integer('change_point')->default(0)->comment('改变积分');
			$table->integer('consume_point')->default(0)->comment('单笔积分消耗的积分值');
			$table->integer('addtime')->unsigned()->default(0)->comment('添加时间');
			$table->integer('expiretime')->unsigned()->default(0)->index('ind_expiretime')->comment('过期时间');
			$table->string('reason', 50)->default('')->comment('理由');
			$table->string('remark', 100)->nullable()->default('')->comment('备注');
			$table->bigInteger('related_id')->unsigned()->nullable()->comment('积分关联对象ID');
			$table->boolean('type')->default(1)->comment('操作类型');
			$table->string('operator', 50)->nullable()->comment('操作员ID');
			$table->enum('status', array('true','false'))->default('false')->comment('同步CRM的状态');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_point');
	}

}
