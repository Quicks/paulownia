<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AddTypePaulowniaToAttributeTableSeeder extends Seeder
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
                'id' => '150',
                'code' => 'type_of_paulownia',
                'admin_name' => 'Type of Paulownia',
                'type' => 'select',
                'validation' => NULL,
                'position' => '29',
                'is_required' => '1',
                'is_unique' => '0',
                'value_per_locale' => '0',
                'value_per_channel' => '0',
                'is_filterable' => '1',
                'is_configurable' => '1',
                'is_user_defined' => '1',
                'is_visible_on_front' => '0',
                'created_at' => $now,
                'updated_at' => $now]
        ]);

        DB::table('attribute_translations')->insert([
            ['id' => '150', 'locale' => 'en', 'name' => 'Type of Paulownia', 'attribute_id' => '150']
        ]);
    }
}

