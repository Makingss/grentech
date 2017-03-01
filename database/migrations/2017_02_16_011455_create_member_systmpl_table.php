<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberSystmplTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_systmpl', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->string('tmpl_name', 100)->primary()->comment('模版名称');
			$table->text('content')->nullable()->comment('模板内容');
			$table->integer('edittime')->comment('编辑时间');
			$table->enum('active', array('true','false'))->nullable()->default('true')->comment('是否激活');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_systmpl');
	}

}
