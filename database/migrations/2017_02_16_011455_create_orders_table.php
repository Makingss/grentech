<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->bigInteger('order_id')->unsigned()->default(0)->primary()->comment('订单号');
			$table->bigInteger('porderid')->unsigned()->nullable()->default(0)->comment('母订单号');
			$table->bigInteger('parent_order_id')->unsigned()->nullable()->default(0)->comment('父订单号,该字段值大于0 表示该订单是子订单');
			$table->decimal('total_amount', 20)->default(0.00)->comment('商品默认货币总值');
			$table->decimal('final_amount', 20)->default(0.00)->comment('订单货币总值, 包含支付价格,税等');
			$table->enum('pay_status', array('0','1','2','3','4','5'))->default('0')->index('ind_pay_status')->comment('付款状态');
			$table->string('cardnum', 50)->nullable()->default('')->comment('身份证号码');
			$table->enum('ship_status', array('0','1','2','3','4','5','6','7','8','9'))->default('0')->index('ind_ship_status')->comment('发货状态');
			$table->enum('delivery_sign_status', array('0','1','2'))->nullable()->default('0')->comment('发货签收状态');
			$table->enum('received_status', array('0','1'))->default('0')->comment('收货状态');
			$table->enum('is_delivery', array('Y','N'))->default('Y')->comment('是否需要发货');
			$table->integer('createtime')->unsigned()->nullable()->index('ind_createtime')->comment('下单时间');
			$table->integer('received_time')->unsigned()->nullable()->comment('收货时间');
			$table->integer('last_modified')->unsigned()->nullable()->index('ind_last_modified')->comment('最后更新时间');
			$table->string('payment', 100)->nullable()->comment('支付方式');
			$table->integer('shipping_id')->unsigned()->nullable()->comment('配送方式');
			$table->string('shipping', 100)->nullable()->comment('配送方式');
			$table->integer('member_id')->unsigned()->nullable()->index('ind_member_id')->comment('会员用户名');
			$table->enum('promotion_type', array('normal','prepare'))->default('normal')->index('ind_promotion_type')->comment('销售类型');
			$table->enum('status', array('active','dead','finish','cancel'))->default('active')->index('ind_status')->comment('订单状态');
			$table->enum('confirm', array('Y','N'))->default('N')->comment('确认状态');
			$table->string('ship_area')->nullable()->comment('收货地区');
			$table->string('ship_name', 50)->nullable()->comment('收货人');
			$table->decimal('weight', 20)->nullable()->comment('订单总重量');
			$table->text('tostr')->nullable()->comment('订单文字描述');
			$table->integer('itemnum')->unsigned()->nullable()->comment('订单子订单数量');
			$table->string('ip', 15)->nullable()->comment('IP地址');
			$table->text('ship_addr', 65535)->nullable()->comment('收货地址');
			$table->string('ship_zip', 20)->nullable()->comment('收货人邮编');
			$table->string('ship_tel', 50)->nullable()->comment('收货电话');
			$table->string('ship_email', 200)->nullable()->comment('收货人email');
			$table->string('ship_time', 50)->nullable()->comment('配送时间');
			$table->string('ship_mobile', 50)->nullable()->comment('收货人手机');
			$table->decimal('cost_item', 20)->default(0.00)->comment('订单商品总价格');
			$table->enum('is_tax', array('true','false'))->default('false')->comment('是否要开发票');
			$table->enum('tax_type', array('false','personal','company'))->default('false')->comment('发票类型');
			$table->string('tax_content')->nullable()->comment('发票内容');
			$table->decimal('cost_tax', 20)->default(0.00)->comment('订单税率');
			$table->string('tax_company')->nullable()->comment('发票抬头');
			$table->enum('is_protect', array('true','false'))->default('false')->comment('是否还有保价费');
			$table->decimal('cost_protect', 20)->default(0.00)->comment('保价费');
			$table->decimal('cost_payment', 20)->nullable()->comment('支付费用');
			$table->string('currency', 8)->nullable()->comment('订单支付货币');
			$table->decimal('cur_rate', 10, 4)->nullable()->default(1.0000)->comment('订单支付货币汇率');
			$table->decimal('score_u', 20)->default(0.00)->comment('订单使用积分');
			$table->decimal('score_g', 20)->default(0.00)->comment('订单获得积分');
			$table->decimal('discount', 20)->default(0.00)->comment('订单减免');
			$table->decimal('pmt_goods', 20)->nullable()->comment('商品促销优惠');
			$table->decimal('pmt_order', 20)->nullable()->comment('订单促销优惠');
			$table->decimal('payed', 20)->nullable()->default(0.00)->comment('订单支付金额');
			$table->text('memo')->nullable()->comment('订单附言');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->enum('displayonsite', array('true','false'))->nullable()->default('true');
			$table->string('mark_type', 2)->default('b1')->comment('订单备注图标');
			$table->text('mark_text')->nullable()->comment('订单备注');
			$table->decimal('cost_freight', 20)->default(0.00)->comment('配送费用');
			$table->string('extend')->nullable()->default('false')->comment('订单扩展');
			$table->string('order_refer', 20)->default('local')->index('idx_order_refer')->comment('订单来源');
			$table->text('addon')->nullable()->comment('订单附属信息(序列化)');
			$table->enum('source', array('pc','wap','weixin'))->nullable()->default('pc')->comment('平台来源');
			$table->enum('is_auto_complete', array('true','false'))->nullable()->default('false')->comment('自动完成');
			$table->integer('branch_id')->nullable()->default(0)->comment('所属仓库门店ID');
			$table->string('branch_name_user', 200)->nullable()->default('')->comment('所属仓库门店');
			$table->integer('staff_id')->nullable()->default(0)->comment('门店员工ID');
			$table->string('staff_name', 200)->nullable()->default('')->comment('员工姓名');
			$table->integer('store_id')->default(-1)->index('ind_store_id')->comment('店铺ID');
			$table->integer('first_id')->default(0)->comment('第一获佣人');
			$table->integer('second_id')->default(0)->comment('第二获佣人');
			$table->integer('share_id')->default(0)->comment('分享人ID');
			$table->enum('is_parent', array('true','false'))->nullable()->default('false')->comment('是否上下级(0:否,1:是)');
			$table->decimal('first_profit', 20)->default(0.00)->comment('第一佣金');
			$table->decimal('second_profit', 20)->default(0.00)->comment('第二佣金');
			$table->text('profit_info')->nullable()->comment('佣金信息');
			$table->enum('is_fetch', array('true','false'))->nullable()->default('false')->comment('是否抓取，生成报表');
			$table->enum('another_pay', array('0','1','2'))->default('0')->comment('代付类型');
			$table->integer('another_member_id')->unsigned()->nullable()->comment('代付会员ID');
			$table->text('another_payinfo')->nullable()->comment('代付信息');
			$table->enum('is_send_customs', array('0','1','2'))->nullable()->default('0')->comment('是否发送海关');
			$table->enum('sync_lijing', array('0','1'))->nullable()->default('0')->comment('同步丽晶');
			$table->enum('sync_refund', array('0','1'))->nullable()->default('0')->comment('退货同步丽晶');
			$table->bigInteger('temp_refund_id')->unsigned()->nullable()->default(0)->comment('售后单ID');
			$table->enum('not_shipped', array('0','1'))->nullable()->default('0')->comment('售前退货');
			$table->integer('delivery_time')->unsigned()->nullable()->comment('发货时间');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
