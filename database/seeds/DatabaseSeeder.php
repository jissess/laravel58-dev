<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermitsTableSeeder::class);
        $this->call(UserHasRoleTableSeeder::class);
        $this->call(RoleHasPermitTableSeeder::class);
        $this->call(MenusTableSeeder::class);
    }
}
