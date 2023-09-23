<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert([
            'title' => 'テストタイトル01',
            'description' => 'テストお知らせ01です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => 'テストタイトル02',
            'description' => 'テストお知らせ02です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => 'テストタイトル03',
            'description' => 'テストお知らせ03です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
