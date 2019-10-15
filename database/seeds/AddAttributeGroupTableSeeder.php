<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAttributeGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_group_mappings')->insert([
            ['attribute_id' => '25','attribute_group_id' => '5','position' => '5'],
            ['attribute_id' => '26','attribute_group_id' => '1','position' => '11'],
        ]);
    }
}
