<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddDeliveryReservationToAttributeTableSeeder extends Seeder
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
                'id' => '151',
                'code' => 'reservation',
                'admin_name' => 'Reservation',
                'type' => 'text',
                'validation' => NULL,
                'position' => '30',
                'is_required' => '0',
                'is_unique' => '0',
                'value_per_locale' => '0',
                'value_per_channel' => '0',
                'is_filterable' => '1',
                'is_configurable' => '1',
                'is_user_defined' => '1',
                'is_visible_on_front' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ], [
                'id' => '152',
                'code' => 'delivery',
                'admin_name' => 'Delivery',
                'type' => 'textarea',
                'validation' => NULL,
                'position' => '31',
                'is_required' => '0',
                'is_unique' => '0',
                'value_per_locale' => '1',
                'value_per_channel' => '1',
                'is_filterable' => '0',
                'is_configurable' => '0',
                'is_user_defined' => '0',
                'is_visible_on_front' => '0',
                'created_at' => $now,
                'updated_at' => $now],


        ]);

        DB::table('attribute_translations')->insert([
            ['id' => '151', 'locale' => 'en', 'name' => 'Reservation', 'attribute_id' => '151'],
            ['id' => '152', 'locale' => 'en', 'name' => 'Delivery', 'attribute_id' => '152']
        ]);
    }
}
