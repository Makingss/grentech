<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDlycorpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dlycorp', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('corp_id')->comment('物流公司ID');
			$table->string('type', 6)->nullable()->index('ind_type')->comment('类型');
			$table->string('corp_code', 200)->nullable()->comment('物流公司代码');
			$table->string('regent_corp_code', 10)->nullable()->comment('regent物流公司编码');
			$table->string('name', 200)->nullable()->comment('物流公司');
			$table->enum('disabled', array('true','false'))->nullable()->default('false')->index('ind_disabled')->comment('失效');
			$table->smallInteger('ordernum')->unsigned()->nullable()->index('ind_ordernum')->comment('排序');
			$table->string('website', 200)->nullable()->comment('物流公司网址');
			$table->string('request_url', 200)->nullable()->comment('查询接口网址');
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
		Schema::drop('dlycorp');
	}

}
