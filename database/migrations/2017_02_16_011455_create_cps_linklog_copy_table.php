<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpsLinklogCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cps_linklog_copy', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('linklog_id')->comment('ID');
			$table->string('refer_id', 10)->default('')->index('ind_refer_id')->comment('首次联盟商户推广ID');
			$table->string('refer_url', 200)->default('')->comment('首次来源URL');
			$table->integer('refer_time')->unsigned()->default(0)->comment('首次来源时间');
			$table->string('c_refer_id', 10)->default('')->comment('本次联盟商户推广ID');
			$table->string('c_refer_url', 200)->default('')->comment('本次来源URL');
			$table->integer('c_refer_time')->unsigned()->default(0)->comment('本次来源时间');
			$table->string('target_id', 32)->default('')->index('ind_target_id')->comment('会员ID/订单ID');
			$table->string('target_type', 50)->default('')->index('ind_target_type')->comment('类型标记');
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
		Schema::drop('cps_linklog_copy');
	}

}
