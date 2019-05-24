<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitsTable extends Migration
{
    protected $table = 'permits';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('action')->nullable()->comment('方法名');
                $table->string('action_tit')->nullable()->comment('方法别名');
                $table->string('element')->nullable()->comment('权限名-查看,添加,修改,删除');
                $table->string('ele_tit')->nullable()->comment('权限别名-index,add,update,del');
                $table->integer('weight')->default('1')->comment('权重');
                $table->integer('pid')->default('0')->comment('所属pid，默认0-顶级分类');

                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable($this->table) && \DB::table($this->table)->count() < 1) {
            Schema::dropIfExists($this->table);
        }
    }
}
