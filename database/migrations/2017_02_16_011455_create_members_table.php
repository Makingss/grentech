<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('member_id')->comment('会员用户名');
			$table->integer('member_lv_id')->unsigned()->default(0)->comment('会员等级');
			$table->integer('member_agency_id')->unsigned()->default(0)->comment('代理商等级');
			$table->integer('first_agency')->unsigned()->nullable()->default(0)->comment('所属一级代理商');
			$table->integer('second_agency')->unsigned()->nullable()->default(0)->comment('所属二级代理商');
			$table->integer('third_agency')->unsigned()->nullable()->default(0)->comment('所属三级代理商');
			$table->integer('four_agency')->unsigned()->nullable()->default(0)->comment('所属四级代理商');
			$table->integer('crm_member_id')->unsigned()->nullable()->default(0)->comment('联通CRM，存储CRM的member_id');
			$table->string('jooge_member_id', 100)->nullable()->default('0')->comment('jooge的member_id');
			$table->string('name', 50)->nullable()->comment('姓名');
			$table->integer('point')->default(0)->comment('积分');
			$table->string('lastname', 50)->nullable()->comment('姓氏');
			$table->string('firstname', 50)->nullable()->comment('名字');
			$table->string('area')->nullable()->comment('地区');
			$table->string('addr')->nullable()->comment('地址');
			$table->string('mobile', 50)->nullable()->comment('手机');
			$table->string('tel', 50)->nullable()->comment('固定电话');
			$table->string('email', 200)->nullable()->default('')->index('ind_email')->comment('EMAIL');
			$table->string('zip', 20)->nullable()->comment('邮编');
			$table->string('info')->nullable()->comment('个人介绍');
			$table->string('wxname')->nullable()->comment('微信号');
			$table->integer('order_num')->unsigned()->nullable()->default(0)->comment('订单数');
			$table->string('refer_id', 50)->nullable()->comment('来源ID');
			$table->string('refer_url', 200)->nullable()->comment('推广来源URL');
			$table->smallInteger('b_year')->unsigned()->nullable()->comment('生年');
			$table->boolean('b_month')->nullable()->comment('生月');
			$table->boolean('b_day')->nullable()->comment('生日');
			$table->enum('sex', array('0','1','2'))->default('2')->comment('性别');
			$table->text('addon')->nullable()->comment('会员额外序列化信息');
			$table->enum('wedlock', array('0','1'))->default('0')->comment('婚姻状况');
			$table->string('education', 30)->nullable()->comment('教育程度');
			$table->string('vocation', 50)->nullable()->comment('职业');
			$table->text('interest')->nullable()->comment('扩展信息里的爱好');
			$table->decimal('advance', 20)->default(0.00)->comment('会员账户余额');
			$table->decimal('advance_freeze', 20)->default(0.00)->comment('会员预存款冻结金额');
			$table->integer('point_freeze')->unsigned()->default(0)->comment('会员当前冻结积分(暂时停用)');
			$table->integer('point_history')->unsigned()->default(0)->comment('会员历史总积分(暂时停用)');
			$table->decimal('score_rate', 5, 3)->nullable()->comment('积分折换率');
			$table->string('reg_ip', 16)->nullable()->comment('注册时IP地址');
			$table->integer('regtime')->unsigned()->nullable()->index('ind_regtime')->comment('注册时间');
			$table->boolean('state')->default(0)->comment('会员验证状态');
			$table->integer('pay_time')->unsigned()->nullable()->comment('上次结算时间');
			$table->decimal('biz_money', 20)->default(0.00)->comment('上次结算后到现在的所有因商业合作(推广人,代理)而产生的可供结算的金额');
			$table->text('fav_tags')->nullable()->comment('会员感兴趣的tag');
			$table->text('custom')->nullable()->comment('用户可根据自己的需要定义额外的会员注册信息,这里存的是序列化后的信息目前系统序列化进去的有： industry:工作行业 company:工作单位 co_addr:公司地址 salary:月收入');
			$table->string('cur', 20)->nullable()->comment('货币(偏爱货币)');
			$table->string('lang', 20)->nullable()->comment('偏好语言');
			$table->smallInteger('unreadmsg')->unsigned()->default(0)->comment('未读信息');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled');
			$table->text('remark', 65535)->nullable()->comment('备注');
			$table->string('remark_type', 2)->default('b1')->comment('备注类型');
			$table->integer('login_count')->default(0);
			$table->integer('experience')->nullable()->default(0)->comment('经验值');
			$table->string('foreign_id')->nullable()->comment('foreign_id(弃用');
			$table->string('resetpwd')->nullable()->comment('找回密码唯一标示');
			$table->integer('resetpwdtime')->unsigned()->nullable()->comment('找回密码时间');
			$table->string('cover')->nullable()->comment('封面图片标识');
			$table->string('avatar')->nullable()->comment('头像图片标识');
			$table->string('member_refer', 50)->nullable()->default('local')->comment('会员来源(弃用)');
			$table->enum('source', array('pc','wap','weixin','api'))->nullable()->default('pc')->comment('平台来源');
			$table->string('pay_password', 32)->nullable()->comment('支付密码');
			$table->enum('member_type', array('1','2'))->nullable()->default('1')->comment('会员类型');
			$table->string('agency_no', 30)->nullable()->default('')->comment('经销商编号');
			$table->string('offline_cardno', 30)->nullable()->default('')->comment('线下会员卡号');
			$table->integer('follow_num')->nullable()->default(0)->comment('关注人数');
			$table->integer('fans_num')->nullable()->default(0)->comment('粉丝人数');
			$table->integer('opinions_num')->nullable()->default(0)->comment('推荐数');
			$table->integer('praise_num')->nullable()->default(0)->comment('被赞数');
			$table->string('source_app', 64)->nullable()->comment('app来源');
			$table->enum('queit', array('true','false'))->nullable()->default('false')->comment('勿扰模式');
			$table->integer('invite_mem_fid')->unsigned()->nullable()->default(0)->comment('父级/上级');
			$table->decimal('quarterly_sales', 20, 3)->unsigned()->nullable()->default(0.000)->comment('季度销售额');
			$table->decimal('total_sales', 20, 3)->unsigned()->nullable()->default(0.000)->comment('总销售额');
			$table->string('completion_rate', 50)->nullable()->default('0%')->comment('任务完成率');
			$table->string('token', 64)->default('0')->comment('token');
			$table->string('referrals_code', 32)->nullable()->default('0')->comment('推荐二维码');
			$table->integer('invite_mem_nums')->unsigned()->nullable()->default(0)->comment('已邀请会员数量');
			$table->enum('is_invite', array('1','0'))->nullable()->comment('是否是邀请成会员');
			$table->enum('is_openinfo', array('1','0'))->nullable()->default('0')->comment('是否开启公告');
			$table->enum('is_withdrawal', array('1','0'))->nullable()->default('0')->comment('能否提现');
			$table->string('shop_cover')->nullable()->comment('店铺图片');
			$table->enum('brithday_change', array('true','false'))->nullable()->default('false')->comment('生日更改标记');
			$table->integer('brithday_change_time')->unsigned()->nullable()->comment('生日更改时间');
			$table->integer('signup_point')->unsigned()->nullable()->comment('注册送积分标记');
			$table->enum('sync_signup_point', array('0','1'))->nullable()->default('0')->comment('用户注册送积分 同步丽晶');
			$table->integer('scaler_num')->unsigned()->nullable()->default(0)->comment('传输记数器');
			$table->integer('share_member_id')->unsigned()->nullable()->comment('推广人ID');
			$table->enum('regent_status', array('1','2','3'))->nullable()->comment('状态');
			$table->string('regent_mem_id', 100)->nullable()->comment('丽晶会员');
			$table->string('nickname', 50)->nullable()->comment('用户昵称');
			$table->string('storeno', 100)->nullable()->comment('关联店铺编号');
			$table->enum('sid_sign', array('true','false'))->nullable()->default('false')->comment('导购标记');
			$table->string('sid', 100)->nullable()->comment('导购id');
			$table->string('province', 100)->nullable()->comment('省份');
			$table->string('city', 100)->nullable()->comment('城市');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
