<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_goods', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('gnotify_id')->comment('ID');
			$table->bigInteger('goods_id')->unsigned()->comment('商品ID');
			$table->integer('member_id')->unsigned()->nullable()->index('ind_member_id')->comment('会员用户名');
			$table->integer('product_id')->unsigned()->nullable()->comment('货品ID');
			$table->string('goods_name', 200)->nullable()->default('')->comment('商品名称');
			$table->decimal('goods_price', 20)->nullable()->default(0.00)->comment('销售价');
			$table->string('image_default_id', 32)->nullable()->comment('默认图片');
			$table->string('email', 100)->nullable()->comment('邮箱');
			$table->string('cellphone', 20)->nullable()->comment('手机号');
			$table->enum('status', array('ready','send','progress'))->comment('状态');
			$table->integer('send_time')->unsigned()->nullable()->comment('发送时间');
			$table->integer('create_time')->unsigned()->nullable()->comment('申请时间');
			$table->enum('disabled', array('true','false'))->nullable()->default('false');
			$table->text('remark')->nullable()->comment('备注');
			$table->enum('type', array('fav','sto'))->nullable()->comment('类型, 收藏还是缺货');
			$table->string('object_type', 100)->nullable()->default('goods')->comment('收藏的类型，goods');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_goods');
	}

}
