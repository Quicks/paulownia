<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddAttributeTableSeeder extends Seeder
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
                'id' => '25',
                'code' => 'delivery_unit_qty',
                'admin_name' => 'Delivery unit qty',
                'type' => 'text',
                'validation' => 'decimal',
                'position' => '25',
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
                'id' => '26',
                'code' => 'min_order_qty',
                'admin_name' => 'Min order qty',
                'type' => 'text',
                'validation' => 'decimal',
                'position' => '26',
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
            ],
        ]);
        DB::table('attribute_translations')->insert([
            [
                'id' => '25',
                'locale' => 'en',
                'name' => 'Delivery unit qty',
                'attribute_id' => '25'
            ], [
                'id' => '26',
                'locale' => 'en',
                'name' => 'Min order qty',
                'attribute_id' => '26'
            ]
        ]);
    }
}
