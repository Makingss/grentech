<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpressPrintTmplTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('express_print_tmpl', function(Blueprint $table)
		{
			$table->engine='InnoDB';
			$table->integer('prt_tmpl_id', true)->comment('打印快递单模板ID');
			$table->string('prt_tmpl_title', 100)->default('0')->comment('单据名称');
			$table->enum('shortcut', array('true','false'))->nullable()->default('false')->comment('是否启用');
			$table->boolean('prt_tmpl_width')->comment('单据宽度(mm)');
			$table->boolean('prt_tmpl_height')->comment('单据高度(mm)');
			$table->boolean('prt_tmpl_offsetx')->default(0)->comment('打印偏移(左)mm');
			$table->boolean('prt_tmpl_offsety')->default(0)->comment('打印偏移(右)mm');
			$table->text('prt_tmpl_data')->nullable()->comment('数据');
			$table->enum('disabled', array('true','false'))->default('false');
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
		Schema::drop('express_print_tmpl');
	}

}
