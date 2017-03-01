<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreatebaseCardWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('createbase_card_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('id', true)->comment('id');
			$table->string('card_id', 48);
			$table->enum('card_type', array('GROUPON','CASH','DISCOUNT','GIFT','GENERAL_COUPON'))->comment('微信卡券类型');
			$table->string('logo_id', 48)->comment('微信卡券logo_id');
			$table->string('brand_name', 36)->default('影儿时尚集团')->comment('商户名称');
			$table->enum('code_type', array('CODE_TYPE_TEXT','CODE_TYPE_BARCODE','CODE_TYPE_QRCODE','CODE_TYPE_ONLY_QRCODE','CODE_TYPE_ONLY_BARCODE','CODE_TYPE_NONE'))->default('CODE_TYPE_TEXT')->comment('卡券编码类型');
			$table->string('title', 27)->comment('卡券名称');
			$table->enum('color', array('Color010','Color020','Color030','Color040','Color050','Color060','Color070','Color080','Color090','Color100','Color101','Color102'))->comment('券颜色');
			$table->string('notice', 48)->comment('卡券使用提醒');
			$table->string('description', 3072)->comment('卡券使用说明');
			$table->integer('quantity')->comment('卡券库存的数量');
			$table->enum('type', array('DATE_TYPE_FIX_TIME_RANGE','DATE_TYPE_FIX_TERM'))->comment('使用时间的类型');
			$table->integer('begin_timestamp')->unsigned()->nullable()->default(0)->comment('开始时间');
			$table->integer('end_timestamp')->unsigned()->nullable()->default(0)->comment('结束时间');
			$table->integer('fixed_term')->nullable()->default(0)->comment('表示领取多少天内有效');
			$table->integer('fixed_begin_term')->nullable()->default(0)->comment('表示领取后多少天生开始效');
			$table->enum('status', array('active','dead'))->nullable()->default('dead')->comment('卡券状态');
			$table->enum('use_custom_code', array('true','false'))->nullable()->default('false')->comment('自定义编码');
			$table->string('get_custom_code_mode', 1024)->nullable()->default('0')->comment('表示该卡券为预存编码模式卡券');
			$table->enum('bind_openid', array('true','false'))->nullable()->default('false')->comment('指定用户领取');
			$table->string('service_phone', 20)->nullable()->default('0')->comment('服务电话');
			$table->string('location_id_list', 1024)->nullable()->default('0')->comment('适用门店号');
			$table->enum('use_all_locations', array('true','false'))->nullable()->default('false')->comment('设置为所有门店号使用');
			$table->string('source', 36)->nullable()->default('0')->comment('第三方来源名称');
			$table->string('custom_url_name', 48)->nullable()->default('立即使用')->comment('自定义跳转外链的入口名字');
			$table->string('center_title', 18)->nullable()->default('立即使用')->comment('卡券顶部居中的按钮，仅在卡券状');
			$table->string('center_sub_title', 24)->nullable()->default('立即享受优惠')->comment('显示在入口下方的提示语');
			$table->string('center_url', 128)->nullable()->default('0')->comment('顶部居中的url');
			$table->string('custom_url', 128)->nullable()->default('0')->comment('自定义跳转的URL');
			$table->string('custom_url_sub_title', 18)->nullable()->default('0')->comment('示在入口右侧的提示语');
			$table->char('get_limit', 7)->nullable()->default(50)->comment('每人可领券的数量限制,不填写默认为50');
			$table->enum('can_share', array('true','false'))->nullable()->default('false')->comment('卡券领取页面是否可分享');
			$table->enum('can_give_friend', array('true','false'))->nullable()->default('false')->comment('卡券是否可转赠');
			$table->string('accept_category', 128)->nullable()->default('0')->comment('指定可用的商品类目，仅用于代金券类型');
			$table->string('reject_category', 128)->nullable()->default('0')->comment('指定不可用的商品类目，仅用于代金券类型');
			$table->integer('least_cost')->nullable()->default(0)->comment('满减门槛字段，可用于兑换券和代金券');
			$table->string('object_use_for', 512)->nullable()->default('0')->comment('购买xx可用类型门槛，仅用于兑换');
			$table->enum('can_use_with_other_discount', array('true','false'))->nullable()->default('false')->comment('可与其他优惠共享');
			$table->string('abstract', 1024)->nullable()->default('0')->comment('封面摘要结构体名称');
			$table->text('icon_url_list', 16777215)->nullable()->comment('封面图片列表');
			$table->text('text_image_list', 16777215)->nullable()->comment('图文列表');
			$table->string('business_service', 30)->nullable()->default('0')->comment('商家服务类型');
			$table->string('time_limit', 10)->nullable()->default('0')->comment('使用时段限制');
			$table->char('begin_hour', 2)->nullable()->default(0)->comment('当天具体有效时间(时)');
			$table->char('begin_minute', 2)->nullable()->default(0)->comment('当天具体有效时间(分)');
			$table->char('end_hour', 2)->nullable()->default(0)->comment('当天具体结束时间(时)');
			$table->char('end_minute', 2)->nullable()->default(0)->comment('当天具体结束时间(分)');
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
		Schema::drop('createbase_card_wx');
	}

}
