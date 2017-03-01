<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reship', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('reship_id', true)->unsigned()->comment('配送流水号');
			$table->string('order_id', 100)->nullable()->comment('订单号');
			$table->string('reship_bn', 32)->nullable()->comment('退货流水号');
			$table->integer('member_id')->unsigned()->nullable()->comment('订货会员ID');
			$table->decimal('money', 20)->default(0.00)->comment('配送费用');
			$table->enum('is_protect', array('true','false'))->default('false')->comment('是否保价');
			$table->string('delivery', 20)->nullable()->comment('配送方式(货到付款、EMS...)');
			$table->string('logi_id', 50)->nullable()->comment('物流公司ID');
			$table->string('logi_name', 100)->nullable()->comment('物流公司名称');
			$table->string('logi_no', 50)->nullable()->index('ind_logi_no')->comment('物流单号');
			$table->string('ship_name', 50)->nullable()->comment('收货人姓名');
			$table->string('ship_area')->nullable()->comment('收货人地区');
			$table->text('ship_addr', 65535)->nullable()->comment('收货人地址');
			$table->string('ship_zip', 20)->nullable()->comment('收货人邮编');
			$table->string('ship_tel', 50)->nullable()->comment('收货人电话');
			$table->string('ship_mobile', 50)->nullable()->comment('收货人手机');
			$table->string('ship_email', 200)->nullable()->comment('收货人Email');
			$table->integer('t_begin')->unsigned()->nullable()->comment('单据生成时间');
			$table->integer('t_send')->unsigned()->nullable()->comment('单据结束时间');
			$table->integer('t_confirm')->unsigned()->nullable()->comment('确认时间');
			$table->string('op_name', 50)->nullable()->comment('操作者');
			$table->enum('status', array('succ','failed','cancel','lost','progress','timeout','ready'))->default('ready')->comment('状态');
			$table->text('memo')->nullable()->comment('备注');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled')->comment('无效');
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
		Schema::drop('reship');
	}

}
