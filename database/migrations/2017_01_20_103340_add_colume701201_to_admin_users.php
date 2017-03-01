<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColume701201ToAdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->enum('is_admin',['N','Y'])->default('N')->comment('是否为超级管理员');
            $table->enum('status',['1','0'])->default('1')->comment('是否启用');
            $table->timestamp('last_login_at')->nullable()->comment('最后登录时间');
            $table->string('config')->nullable()->comment('配置');
            $table->string('last_login_ip')->nullable()->comment('上次登录IP');
            $table->string('op_id')->nullable()->comment('操作员ID');
            $table->enum('disabled',['false','true'])->default('false')->comment('是否失效');
            $table->integer('logincount')->unsigned()->delault(0)->commment('登录次数');
            $table->text('memo')->nullable()->comment('备注信息');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'status', 'last_login_at','last_login_ip'],'op_id','disabled','logincount','memo');
        });
    }
}
