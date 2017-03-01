<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentArticleBodysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_article_bodys', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('id')->comment('自增id');
			$table->integer('article_id')->unsigned()->unique('ind_article_id')->comment('文章id');
			$table->string('tmpl_path', 50)->nullable()->comment('单独页模板');
			$table->text('content')->nullable()->comment('文章内容');
			$table->string('seo_title', 100)->nullable()->comment('SEO标题');
			$table->text('seo_description', 16777215)->nullable()->comment('SEO简介');
			$table->string('seo_keywords', 200)->nullable()->comment('SEO关键字');
			$table->text('goods_info')->nullable()->comment('关联产品');
			$table->text('hot_link')->nullable()->comment('热词');
			$table->integer('length')->unsigned()->nullable()->comment('内容长度');
			$table->string('image_id', 32)->nullable()->comment('图片id');
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
		Schema::drop('content_article_bodys');
	}

}
