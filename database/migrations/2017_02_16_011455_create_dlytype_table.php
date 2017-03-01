<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDlytypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dlytype', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('dt_id')->comment('配送ID');
			$table->string('dt_name', 50)->nullable()->comment('配送方式');
			$table->enum('has_cod', array('true','false'))->default('false')->comment('货到付款');
			$table->integer('firstunit')->unsigned()->default(0)->comment('首重');
			$table->integer('continueunit')->unsigned()->default(0)->comment('续重');
			$table->enum('is_threshold', array('0','1'))->nullable()->default('0')->comment('临界值');
			$table->text('threshold')->nullable()->comment('临界值配置参数');
			$table->enum('protect', array('true','false'))->default('false')->comment('物流保价');
			$table->float('protect_rate', 6, 3)->nullable()->comment('报价费率');
			$table->float('minprice', 10)->default(0.00)->comment('保价费最低值');
			$table->enum('setting', array('0','1'))->nullable()->default('1')->comment('地区费用类型');
			$table->enum('def_area_fee', array('true','false'))->nullable()->default('false')->comment('按地区设置配送费用时,是否启用默认配送费用');
			$table->float('firstprice', 10)->nullable()->default(0.00)->comment('首重费用');
			$table->float('continueprice', 10)->nullable()->default(0.00)->comment('续重费用');
			$table->float('dt_discount', 10)->nullable()->default(0.00)->comment('折扣值');
			$table->text('dt_expressions')->nullable()->comment('配送费用计算表达式');
			$table->enum('dt_useexp', array('true','false'))->nullable()->default('false')->comment('是否使用公式');
			$table->integer('corp_id')->unsigned()->nullable()->comment('物流公司ID');
			$table->enum('dt_status', array('0','1'))->nullable()->default('1')->comment('是否开启');
			$table->text('detail')->nullable()->comment('详细描述');
			$table->text('area_fee_conf')->nullable()->comment('指定地区配置的一系列参数');
			$table->smallInteger('ordernum')->nullable()->default(0)->comment('排序');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
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
		Schema::drop('dlytype');
	}

}
