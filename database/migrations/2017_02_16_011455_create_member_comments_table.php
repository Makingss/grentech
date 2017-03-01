<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_comments', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('comment_id')->comment('评论ID');
			$table->integer('for_comment_id')->nullable()->default(0)->index('index_for_comment_id')->comment('对m的回复');
			$table->bigInteger('type_id')->unsigned()->nullable()->comment('名称');
			$table->integer('product_id')->unsigned()->nullable()->default(0)->comment('货品ID');
			$table->bigInteger('order_id')->unsigned()->nullable()->comment('订单编号');
			$table->enum('object_type', array('ask','discuss','buy','message','msg','order'))->default('ask')->comment('类型');
			$table->integer('author_id')->nullable()->default(0)->index('ind_author_id')->comment('作者ID');
			$table->string('author', 100)->nullable()->comment('发表人');
			$table->string('contact')->nullable()->comment('联系方式');
			$table->enum('mem_read_status', array('false','true'))->nullable()->default('false')->comment('会员阅读标识');
			$table->enum('adm_read_status', array('false','true'))->nullable()->default('false')->comment('管理员阅读标识');
			$table->integer('time')->unsigned()->nullable()->comment('时间');
			$table->integer('lastreply')->unsigned()->nullable()->comment('最后回复时间');
			$table->string('reply_name', 100)->nullable()->comment('最后回复人');
			$table->enum('inbox', array('true','false'))->nullable()->default('true')->comment('收件箱');
			$table->enum('track', array('true','false'))->nullable()->default('true')->comment('发件箱');
			$table->enum('has_sent', array('true','false'))->nullable()->default('true')->comment('是否发送');
			$table->integer('to_id')->unsigned()->default(0)->index('ind_to_id')->comment('目标会员序号ID');
			$table->string('to_uname', 100)->nullable()->comment('目标会员姓名');
			$table->string('title')->nullable()->comment('标题');
			$table->text('comment')->nullable()->comment('内容');
			$table->string('ip', 15)->nullable()->comment('ip地址');
			$table->enum('display', array('true','false'))->nullable()->default('true')->comment('前台是否显示');
			$table->string('gask_type', 50)->nullable()->default('')->comment('留言类型 针对订单留言');
			$table->text('addon')->nullable()->comment('序列化');
			$table->boolean('p_index')->nullable()->comment('弃用');
			$table->enum('disabled', array('false','true'))->nullable()->default('false');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_comments');
	}

}
