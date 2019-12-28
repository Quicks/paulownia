<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAttributeFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_families')->insert([
            ['id' => '101','code' => 'paulownia','name' => 'Paulownia','status' => '0','is_user_defined' => '1']
        ]);
    }
}
