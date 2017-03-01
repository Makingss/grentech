<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardEventWxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('card_event_wx', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('EventId', true)->comment('id');
			$table->integer('MemberId')->comment('会员用户名');
			$table->char('ToUserName', 32)->comment('开发者微信号');
			$table->char('FromUserName', 32)->comment('open_id');
			$table->integer('CreateTime')->unsigned()->comment('创建时间');
			$table->char('MsgType', 32)->comment('消息类型');
			$table->enum('Event', array('user_get_card','user_gifting_card','user_del_card'))->comment('事件类型');
			$table->char('CardId', 32)->comment('卡券ID');
			$table->char('IsGiveByFriend', 32)->comment('事件类型');
			$table->char('FriendUserName', 32)->nullable()->comment('转赠接收方open_id');
			$table->char('UserCardCode', 32)->comment('code 序列号');
			$table->char('OldUserCardCode', 32)->nullable()->comment('转赠前的code');
			$table->char('OuterStr', 32)->nullable()->comment('领取场景值');
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
		Schema::drop('card_event_wx');
	}

}
