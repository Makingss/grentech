<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentArticleIndexsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_article_indexs', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('article_id')->comment('文章ID');
			$table->string('title', 200)->comment('文章标题');
			$table->enum('platform', array('pc','wap'))->default('pc')->comment('客户端');
			$table->enum('type', array('1','2','3'))->default('1')->comment('文章类型');
			$table->integer('node_id')->unsigned()->index('ind_node_id')->comment('节点');
			$table->string('author', 50)->nullable()->comment('作者');
			$table->integer('pubtime')->unsigned()->nullable()->index('ind_pubtime')->comment('发布时间（无需精确到秒）');
			$table->integer('uptime')->unsigned()->nullable()->comment('更新时间（精确到秒）');
			$table->enum('level', array('1','2'))->default('1')->index('ind_level')->comment('文章等级');
			$table->enum('ifpub', array('true','false'))->default('false')->index('ind_ifpub')->comment('发布');
			$table->integer('pv')->unsigned()->nullable()->default(0)->index('ind_pv')->comment('pageview');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled');
			$table->char('sctype', 1)->nullable()->default(0);
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
		Schema::drop('content_article_indexs');
	}

}
