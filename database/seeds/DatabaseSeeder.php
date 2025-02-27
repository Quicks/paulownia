<?php

use Illuminate\Database\Seeder;
use Webkul\Admin\Database\Seeders\DatabaseSeeder as BagistoDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BagistoDatabaseSeeder::class);
        $this->call(AddAttributeTableSeeder::class);
        $this->call(AddAttributeGroupTableSeeder::class);
        $this->call(AddProductAttributeTableSeeder::class);
        $this->call(ProductAttributeTableSeeder::class);
        $this->call(TickerContentsTableSeeder::class);
        $this->call(AddAttributeFamilyTableSeeder::class);
        $this->call(AddTypePaulowniaToAttributeTableSeeder::class);
        $this->call(AddTypeOptionTableSeeder::class);
        $this->call(AddPaulowniaAttributeGroupTableSeeder::class);
        $this->call(AddDeliveryReservationToAttributeTableSeeder::class);
        $this->call(AddDeliveryReservationToAttributeGroupMappingTableSeeder::class);
        $this->call(AddFAQTopicsToContentTableSeeder::class);
    }
}
