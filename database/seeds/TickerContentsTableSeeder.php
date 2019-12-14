<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TickerContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->delete();
        DB::table('content_translations')->delete();
        DB::table('contents')->insert([
            ['id'=>1, 'name' => 'products_ticker', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);

        DB::table('content_translations')->insert([
            ['content_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Message for customer that can be changed', 'locale' => 'en']
        ]);
    }
}
