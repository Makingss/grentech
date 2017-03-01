<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_event', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('积分日志ID');
			$table->integer('member_id')->default(0)->index('ind_member_id')->comment('会员ID');
			$table->enum('type_value', array('point'))->comment('优惠项');
			$table->char('values', 32)->default(0)->comment('优惠值');
			$table->integer('addtime')->unsigned()->default(0)->comment('添加时间');
			$table->integer('expiretime')->unsigned()->default(0)->index('ind_expiretime')->comment('过期时间');
			$table->char('values_init', 32)->nullable()->default(0)->comment('原值');
			$table->char('values_total', 32)->nullable()->default(0)->comment('总值');
			$table->string('reason', 50)->default('')->comment('理由');
			$table->string('remark', 100)->nullable()->default('')->comment('备注');
			$table->bigInteger('related_id')->unsigned()->nullable()->comment('积分关联对象ID');
			$table->string('operator', 50)->nullable()->comment('操作员ID');
			$table->enum('status', array('true','false'))->default('false')->comment('同步CRM的状态');
			$table->enum('is_repeat', array('true','false'))->default('false')->comment('是否重复使用');
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
		Schema::drop('activity_event');
	}

}
