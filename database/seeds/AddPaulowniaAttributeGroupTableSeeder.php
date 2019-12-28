<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddPaulowniaAttributeGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_groups')->insert([
            ['id' => '101','name' => 'General','position' => '1','is_user_defined' => '0','attribute_family_id' => '101'],
            ['id' => '102','name' => 'Description','position' => '2','is_user_defined' => '0','attribute_family_id' => '101'],
            ['id' => '103','name' => 'Meta Description','position' => '3','is_user_defined' => '0','attribute_family_id' => '101'],
            ['id' => '104','name' => 'Price','position' => '4','is_user_defined' => '0','attribute_family_id' => '101'],
            ['id' => '105','name' => 'Shipping','position' => '5','is_user_defined' => '0','attribute_family_id' => '101']
        ]);

        DB::table('attribute_group_mappings')->insert([
            ['attribute_id' => '1','attribute_group_id' => '101','position' => '1'],
            ['attribute_id' => '2','attribute_group_id' => '101','position' => '2'],
            ['attribute_id' => '3','attribute_group_id' => '101','position' => '3'],
            ['attribute_id' => '4','attribute_group_id' => '101','position' => '4'],
            ['attribute_id' => '5','attribute_group_id' => '101','position' => '5'],
            ['attribute_id' => '6','attribute_group_id' => '101','position' => '6'],
            ['attribute_id' => '7','attribute_group_id' => '101','position' => '7'],
            ['attribute_id' => '8','attribute_group_id' => '101','position' => '8'],
            ['attribute_id' => '103','attribute_group_id' => '101','position' => '9'],
            ['attribute_id' => '150','attribute_group_id' => '101','position' => '10'],

            ['attribute_id' => '9','attribute_group_id' => '102','position' => '1'],
            ['attribute_id' => '10','attribute_group_id' => '102','position' => '2'],

            ['attribute_id' => '16','attribute_group_id' => '103','position' => '1'],
            ['attribute_id' => '17','attribute_group_id' => '103','position' => '2'],
            ['attribute_id' => '18','attribute_group_id' => '103','position' => '3'],

            ['attribute_id' => '11','attribute_group_id' => '104','position' => '1'],
            ['attribute_id' => '12','attribute_group_id' => '104','position' => '2'],
            ['attribute_id' => '13','attribute_group_id' => '104','position' => '3'],
            ['attribute_id' => '14','attribute_group_id' => '104','position' => '4'],
            ['attribute_id' => '15','attribute_group_id' => '104','position' => '5'],

            ['attribute_id' => '100','attribute_group_id' => '105','position' => '1'],
            ['attribute_id' => '101','attribute_group_id' => '105','position' => '2'],
            ['attribute_id' => '102','attribute_group_id' => '105','position' => '3'],
            ['attribute_id' => '19','attribute_group_id' => '105','position' => '4'],
            ['attribute_id' => '20','attribute_group_id' => '105','position' => '5'],
            ['attribute_id' => '21','attribute_group_id' => '105','position' => '6'],
            ['attribute_id' => '22','attribute_group_id' => '105','position' => '7'],
        ]);
    }
}
