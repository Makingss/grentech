<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeixinMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('weixin_menus', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('menu_id')->comment('节点id');
			$table->integer('parent_id')->unsigned()->default(0)->comment('父节点');
			$table->boolean('menu_depth')->default(0)->comment('节点深度');
			$table->integer('bind_id')->unsigned()->default(0)->comment('公众账号ID');
			$table->enum('menu_theme', array('1','2','3'))->default('1')->comment('自定义菜单模板');
			$table->string('menu_name', 50)->default('')->comment('菜单名称');
			$table->enum('content_type', array('msg_url','msg_text','msg_image'))->default('msg_url')->comment('回复类型');
			$table->text('msg_url', 65535)->nullable()->comment('自定义链接');
			$table->integer('msg_text')->unsigned()->nullable()->comment('文字信息');
			$table->integer('msg_image')->unsigned()->nullable()->comment('图文信息');
			$table->string('menu_path', 200)->nullable()->comment('节点路径');
			$table->enum('has_children', array('true','false'))->default('false')->comment('是否存在子节点');
			$table->integer('ordernum')->unsigned()->default(0)->index('ind_ordernum')->comment('排序');
			$table->integer('uptime')->unsigned()->nullable()->comment('修改时间');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('weixin_menus');
	}

}
