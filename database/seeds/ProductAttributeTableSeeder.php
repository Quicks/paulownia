<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_group_mappings')->insert([
            ['attribute_id' => '102','attribute_group_id' => '5','position' => '6'],
            ['attribute_id' => '103','attribute_group_id' => '1','position' => '12'],
        ]);
    }
}
