<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    protected $table = 'menus';

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
                $table->string('action')->comment('菜单名称');
                $table->string('act_title')->comment('菜单名称别名');
                $table->integer('weight')->default(1)->comment('菜单权重');
                $table->tinyInteger('pid')->default(0)->comment('pid--0-顶级');

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
