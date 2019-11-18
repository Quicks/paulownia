<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('attributes')->insert([
            [
                'id' => '102',
                'code' => 'volume_box',
                'admin_name' => 'Volume box',
                'type' => 'text',
                'validation' => 'decimal',
                'position' => '27',
                'is_required' => '1',
                'is_unique' => '0',
                'value_per_locale' => '0',
                'value_per_channel' => '0',
                'is_filterable' => '0',
                'is_configurable' => '0',
                'is_user_defined' => '1',
                'is_visible_on_front' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ], [
                'id' => '103',
                'code' => 'height_tree',
                'admin_name' => 'Height tree',
                'type' => 'text',
                'validation' => 'decimal',
                'position' => '28',
                'is_required' => '0',
                'is_unique' => '0',
                'value_per_locale' => '0',
                'value_per_channel' => '0',
                'is_filterable' => '0',
                'is_configurable' => '0',
                'is_user_defined' => '1',
                'is_visible_on_front' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
        DB::table('attribute_translations')->insert([
            [
                'id' => '202',
                'locale' => 'en',
                'name' => 'Volume box',
                'attribute_id' => '102'
            ], [
                'id' => '203',
                'locale' => 'en',
                'name' => 'Height tree',
                'attribute_id' => '103'
            ]
        ]);
    }
}
