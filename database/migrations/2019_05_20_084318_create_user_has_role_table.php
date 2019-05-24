<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasRoleTable extends Migration
{
    protected $table = 'user_has_role';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {
                $table->integer('user_id')->comment('用户id');
                $table->integer('role_id')->comment('角色id');
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
