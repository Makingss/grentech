<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinMessageImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_message_image', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('节点ID');
			$table->string('name')->comment('消息名称');
			$table->string('title')->nullable()->comment('图文消息标题');
			$table->text('description')->nullable()->comment('图文消息描述');
			$table->string('picurl', 32)->nullable()->comment('图文图片');
			$table->text('url', 65535)->nullable()->comment('图片连接地址');
			$table->integer('parent_id')->unsigned()->default(0)->comment('父节点');
			$table->boolean('message_depth')->default(0)->comment('节点深度');
			$table->enum('has_children', array('true','false'))->default('false')->comment('是否存在子节点');
			$table->integer('ordernum')->unsigned()->default(0)->comment('排序');
			$table->integer('uptime')->unsigned()->nullable()->comment('修改时间');
			$table->enum('is_check_bind', array('true','false'))->nullable()->default('false')->comment('发生此消息前是否需要验证绑定');
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
		Schema::drop('weixin_message_image');
	}

}
