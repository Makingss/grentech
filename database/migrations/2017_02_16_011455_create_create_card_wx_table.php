<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreateCardWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('create_card_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('Id', true)->comment('id');
			$table->string('CardNo', 48)->unique();
			$table->enum('CardType', array('GROUPON','CASH','DISCOUNT','GIFT','GENERAL_COUPON'))->comment('微信卡券类型');
			$table->string('CardAttr');
			$table->string('LogoId', 48)->comment('素材管理logo_id');
			$table->string('BrandName', 36)->default('')->comment('商户名称');
			$table->enum('CodeType', array('CODE_TYPE_TEXT','CODE_TYPE_BARCODE','CODE_TYPE_QRCODE','CODE_TYPE_ONLY_QRCODE','CODE_TYPE_ONLY_BARCODE','CODE_TYPE_NONE'))->default('CODE_TYPE_TEXT')->comment('卡券编码类型');
			$table->string('Title', 27)->comment('卡券名称');
			$table->enum('Color', array('Color010','Color020','Color030','Color040','Color050','Color060','Color070','Color080','Color090','Color100','Color101','Color102'))->comment('券颜色');
			$table->string('Notice', 48)->comment('卡券使用提醒');
			$table->string('Description', 3072)->comment('卡券使用说明');
			$table->integer('Quantity')->comment('卡券库存的数量');
			$table->enum('DateType', array('DATE_TYPE_FIX_TIME_RANGE','DATE_TYPE_FIX_TERM'))->comment('使用时间的类型');
			$table->integer('CodeBeginTime')->unsigned()->nullable()->default(0)->comment('开始时间');
			$table->integer('CodeLoseEffectivenessTime')->unsigned()->nullable()->default(0)->comment('结束时间');
			$table->integer('FixedTerm')->nullable()->default(0)->comment('表示领取多少天内有效');
			$table->integer('FixedBeginTerm')->nullable()->default(0)->comment('表示领取后多少天内生开始效');
			$table->enum('Status', array('active','dead'))->nullable()->default('dead')->comment('卡券状态');
			$table->enum('UseCustomCode', array('true','false'))->nullable()->default('false')->comment('自定义编码');
			$table->string('GetCustomCodeMode', 1024)->nullable()->default('0')->comment('表示该卡券为预存编码模式卡券');
			$table->enum('BindOpenid', array('true','false'))->nullable()->default('false')->comment('指定用户领取');
			$table->string('ServicePhone', 20)->nullable()->default('0')->comment('服务电话');
			$table->string('LocationIdList', 1024)->nullable()->default('0')->comment('适用门店号');
			$table->enum('UseAllLocations', array('true','false'))->nullable()->default('false')->comment('设置为所有门店号使用');
			$table->string('Source', 36)->nullable()->default('0')->comment('第三方来源名称');
			$table->string('CustomUrlName', 48)->nullable()->default('立即使用')->comment('自定义跳转外链的入口名字');
			$table->string('CenterTitle', 18)->nullable()->default('立即使用')->comment('卡券顶部居中的按钮，仅在卡券状');
			$table->string('CenterSubTitle', 24)->nullable()->default('立即享受优惠')->comment('显示在入口下方的提示语');
			$table->string('CenterUrl', 128)->nullable()->default('0')->comment('顶部居中的url');
			$table->string('CustomUrl', 128)->nullable()->default('0')->comment('自定义跳转的URL');
			$table->string('CustomUrlSubTitle', 18)->nullable()->default('0')->comment('示在入口右侧的提示语');
			$table->char('GetLimit', 7)->nullable()->default(50)->comment('每人可领券的数量限制,不填写默认为50');
			$table->enum('CanShare', array('true','false'))->nullable()->default('false')->comment('卡券领取页面是否可分享');
			$table->enum('CanGiveFriend', array('true','false'))->nullable()->default('false')->comment('卡券是否可转赠');
			$table->string('AcceptCategory', 128)->nullable()->default('0')->comment('指定可用的商品类目，仅用于代金券类型');
			$table->string('RejectCategory', 128)->nullable()->default('0')->comment('指定不可用的商品类目，仅用于代金券类型');
			$table->integer('LeastCost')->nullable()->default(0)->comment('满减门槛字段，可用于兑换券和代金券');
			$table->string('ObjectUseFor', 512)->nullable()->default('0')->comment('购买xx可用类型门槛，仅用于兑换');
			$table->enum('CanUseWithOtherDiscount', array('true','false'))->nullable()->default('false')->comment('可与其他优惠共享');
			$table->string('Abstract', 1024)->nullable()->default('0')->comment('封面摘要结构体名称');
			$table->text('IconUrlList', 16777215)->nullable()->comment('封面图片列表');
			$table->text('TextImageList', 16777215)->nullable()->comment('图文列表');
			$table->string('BusinessService', 30)->nullable()->default('0')->comment('商家服务类型');
			$table->string('TimeLimit', 10)->nullable()->default('0')->comment('使用时段限制');
			$table->char('BeginHour', 2)->nullable()->default(0)->comment('当天具体有效时间(时)');
			$table->char('BeginMinute', 2)->nullable()->default(0)->comment('当天具体有效时间(分)');
			$table->char('EndHour', 2)->nullable()->default(0)->comment('当天具体结束时间(时)');
			$table->char('EndMinute', 2)->nullable()->default(0)->comment('当天具体结束时间(分)');
//			$table->primary(['Id','CardNo']);
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
		Schema::drop('create_card_wx');
	}

}
