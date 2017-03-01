<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentArticleNodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_article_nodes', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('node_id')->comment('节点id');
			$table->integer('parent_id')->unsigned()->default(0)->comment('父节点');
			$table->boolean('node_depth')->default(0)->comment('节点深度');
			$table->string('node_name', 50)->default('')->comment('节点名称');
			$table->string('node_pagename', 50)->nullable()->comment('节点页面名');
			$table->string('node_path', 200)->nullable()->comment('节点路径');
			$table->string('seo_title', 100)->nullable()->comment('SEO标题');
			$table->text('seo_description', 16777215)->nullable()->comment('SEO简介');
			$table->string('seo_keywords', 200)->nullable()->comment('SEO关键字');
			$table->enum('has_children', array('true','false'))->default('false')->comment('是否存在子节点');
			$table->enum('ifpub', array('true','false'))->default('false')->comment('发布');
			$table->enum('hasimage', array('true','false'))->default('false')->comment('图');
			$table->integer('ordernum')->unsigned()->default(0)->index('ind_ordernum')->comment('排序');
			$table->enum('homepage', array('true','false'))->nullable()->default('false')->comment('主页');
			$table->integer('uptime')->unsigned()->nullable()->comment('修改时间');
			$table->string('tmpl_path', 50)->nullable()->comment('单独页模板');
			$table->string('list_tmpl_path', 50)->nullable()->comment('列表页模板');
			$table->text('content')->nullable()->comment('文章内容');
			$table->enum('disabled', array('true','false'))->default('false')->index('ind_disabled');
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
		Schema::drop('content_article_nodes');
	}

}
