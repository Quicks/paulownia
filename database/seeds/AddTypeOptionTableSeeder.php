<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTypeOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_options')->insert([
            ['id' => '100', 'admin_name' => 'Ze Pro', 'sort_order' => '1', 'attribute_id' => '150'],
            ['id' => '101', 'admin_name' => 'Turbo Pro', 'sort_order' => '2', 'attribute_id' => '150'],
            ['id' => '102', 'admin_name' => 'Pao Tong', 'sort_order' => '3', 'attribute_id' => '150'],
            ['id' => '103', 'admin_name' => 'Shan Tong', 'sort_order' => '4', 'attribute_id' => '150'],
            ['id' => '104', 'admin_name' => 'Elongata', 'sort_order' => '5', 'attribute_id' => '150'],
            ['id' => '105', 'admin_name' => 'Tomentosa', 'sort_order' => '6', 'attribute_id' => '150'],
            ['id' => '106', 'admin_name' => 'Kawakamii', 'sort_order' => '7', 'attribute_id' => '150']
        ]);

        DB::table('attribute_option_translations')->insert([
            ['id' => '100', 'locale' => 'en', 'label' => 'Ze Pro', 'attribute_option_id' => '100'],
            ['id' => '101', 'locale' => 'en', 'label' => 'Turbo Pro', 'attribute_option_id' => '101'],
            ['id' => '102', 'locale' => 'en', 'label' => 'Pao Tong', 'attribute_option_id' => '102'],
            ['id' => '103', 'locale' => 'en', 'label' => 'Shan Tong', 'attribute_option_id' => '103'],
            ['id' => '104', 'locale' => 'en', 'label' => 'Elongata', 'attribute_option_id' => '104'],
            ['id' => '105', 'locale' => 'en', 'label' => 'Tomentosa', 'attribute_option_id' => '105'],
            ['id' => '106', 'locale' => 'en', 'label' => 'Kawakamii', 'attribute_option_id' => '106']
        ]);
    }
}
