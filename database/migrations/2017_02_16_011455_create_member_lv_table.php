<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberLvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_lv', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('member_lv_id')->comment('ID');
			$table->string('name', 100)->default('')->unique('ind_name')->comment('等级名称');
			$table->string('lv_logo')->nullable()->comment('会员等级LOGO');
			$table->decimal('dis_count', 5)->default(1.00)->comment('会员折扣率');
			$table->integer('pre_id')->nullable()->comment('前一级别ID');
			$table->enum('default_lv', array('0','1'))->default('0')->comment('是否默认');
			$table->integer('deposit_freeze_time')->nullable()->default(0)->comment('保证金冻结时间');
			$table->integer('deposit')->nullable()->default(0)->comment('所需保证金金额');
			$table->integer('more_point')->nullable()->default(1)->comment('会员等级积分倍率');
			$table->enum('lv_type', array('retail','wholesale','dealer'))->default('retail')->comment('等级类型');
			$table->integer('point')->unsigned()->default(0)->comment('所需积分');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->enum('show_other_price', array('true','false'))->default('true')->comment('查阅其他会员等级价格');
			$table->boolean('order_limit')->default(0)->comment('会员每次下单限制. 0不限制 1遵守批发规则中的最小起批数量和混批规则中的最小起批数量/金额 2 此等级会员每次下单必须达到');
			$table->decimal('order_limit_price', 20)->default(0.00)->comment('每次下单必须达到的金额');
			$table->text('lv_remark', 65535)->nullable()->comment('会员等级备注');
			$table->integer('experience')->default(0)->comment('经验值');
			$table->integer('expiretime')->default(0)->comment('积分过期时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_lv');
	}

}
