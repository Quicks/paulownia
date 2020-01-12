<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddDeliveryReservationToAttributeGroupMappingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_group_mappings')->insert([
            ['attribute_id' => '151','attribute_group_id' => '5','position' => '8'],
            ['attribute_id' => '152','attribute_group_id' => '5','position' => '9'],
            ['attribute_id' => '151','attribute_group_id' => '105','position' => '8'],
            ['attribute_id' => '152','attribute_group_id' => '105','position' => '9'],
        ]);
    }
}
