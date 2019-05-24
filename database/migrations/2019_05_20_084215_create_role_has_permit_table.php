<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasPermitTable extends Migration
{
    protected $table = 'role_has_permit';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {
                $table->integer('role_id')->comment('角色id');
                $table->integer('permit_id')->comment('权限id');
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
