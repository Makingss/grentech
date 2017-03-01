<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specification', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->increments('spec_id')->comment('规格id');
			$table->string('spec_name', 50)->default('')->comment('规格名称');
			$table->enum('spec_show_type', array('select','flat'))->default('flat')->comment('显示方式');
			$table->enum('spec_type', array('text','image'))->default('text')->comment('类型');
			$table->string('spec_memo', 50)->default('')->comment('规格备注');
			$table->integer('p_order')->unsigned()->default(0)->comment('排序');
			$table->enum('disabled', array('true','false'))->default('false');
			$table->string('alias')->nullable()->default('')->comment('规格别名');
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
		Schema::drop('specification');
	}

}
