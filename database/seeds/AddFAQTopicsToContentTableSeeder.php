<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddFAQTopicsToContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            ['id'=>2, 'name' => 'topic1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id'=>3, 'name' => 'topic2', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id'=>4, 'name' => 'topic3', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id'=>5, 'name' => 'topic4', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id'=>6, 'name' => 'topic5', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);

        DB::table('content_translations')->insert([
            ['content_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Topic1', 'locale' => 'en'],
            ['content_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Topic2', 'locale' => 'en'],
            ['content_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Topic3', 'locale' => 'en'],
            ['content_id' => 5, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Topic4', 'locale' => 'en'],
            ['content_id' => 6, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'text' => 'Topic5', 'locale' => 'en']
        ]);
    }
}
