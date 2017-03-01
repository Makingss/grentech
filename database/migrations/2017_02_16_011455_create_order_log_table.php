<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderLogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_log', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('log_id')->comment('订单日志ID');
            $table->bigInteger('rel_id')->unsigned()->default(0)->index('ind_rel_id')->comment('对象ID');
            $table->integer('op_id')->unsigned()->nullable()->comment('操作员ID');
            $table->string('op_name', 100)->nullable()->comment('操作人名称');
            $table->integer('alttime')->unsigned()->nullable()->comment('操作时间');
            $table->enum('bill_type', array('order', 'recharge', 'joinfee', 'prepaid_recharge'))->default('order')->comment('操作人员姓名');
            $table->enum('behavior', array('creates', 'updates', 'payments', 'refunds', 'delivery', 'receive', 'reship', 'complete', 'finish', 'cancel'))->default('payments')->comment('日志记录操作的行为');
            $table->enum('result', array('SUCCESS', 'FAILURE'))->comment('日志结果');
            $table->text('log_text')->nullable()->comment('操作内容');
            $table->text('addon')->nullable()->comment('序列化数据');
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
        Schema::drop('order_log');
    }

}
