<?php

use Illuminate\Database\Seeder;

class PermitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Helper\SeederHelper::do(new \App\Models\Base\Permits());
    }
}
