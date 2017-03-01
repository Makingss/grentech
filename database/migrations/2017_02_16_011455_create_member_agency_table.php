<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_agency', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('member_agency_id')->unsigned()->primary()->comment('ID');
			$table->string('name', 100)->default('')->unique('ind_name')->comment('名称');
			$table->decimal('rate', 5)->default(1.00)->comment('提成比例');
			$table->decimal('month_price', 20)->default(0.00)->comment('提现满足条件');
			$table->text('remark', 65535)->nullable()->comment('备注');$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_agency');
	}

}
