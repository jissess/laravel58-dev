<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    protected $table = 'users';
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
                $table->string('user_no', 20);
                $table->string('user_code', 20);
                $table->string('user_name', 30);
                $table->string('photo', 200)->nullable()->comment('头像');
                $table->string('password', 64);
                $table->string('remember_token', 100)->nullable();
                $table->tinyinteger('gender')->nullable()->default(1)->comment('1-男,2-女');
                $table->tinyinteger('status')->nullable()->default(1)->comment('1-启用2-禁用，-1删除');

                $table->timestamps();

                $table->unique('user_code');
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
