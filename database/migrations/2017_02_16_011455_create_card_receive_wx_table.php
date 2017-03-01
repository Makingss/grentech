<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardReceiveWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('card_receive_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('Id', true)->comment('用户领取卡券自增编号id');
			$table->integer('MemberId')->nullable()->default(0)->comment('会员用户名');
			$table->char('OpenId', 32)->comment('开发者微信号');
			$table->enum('Status', array('active','gift','dead','finish'))->comment('卡券状态');
			$table->integer('CreateTime')->unsigned()->comment('创建时间');
			$table->char('MsgType', 32)->comment('消息类型信息');
			$table->char('Event', 32)->comment('事件类型');
			$table->char('CardId', 32)->comment('卡券ID：创建卡券表中主键ID');
			$table->char('IsGiveByFriend', 32)->default(0)->comment('是都转赠');
			$table->char('FriendUserName', 32)->nullable()->default(0)->comment('转赠接收方open_id');
			$table->char('UserCardCode', 32)->comment('code 序列号');
			$table->char('OldUserCardCode', 32)->nullable()->default(0)->comment('转赠前的code');
			$table->char('OuterStr', 32)->nullable()->default(0)->comment('领取场景值');
			$table->integer('LocalCreateTime')->unsigned()->comment('创建时间');
//			$table->primary(['Id','CardId','UserCardCode']);
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
		Schema::drop('card_receive_wx');
	}

}
