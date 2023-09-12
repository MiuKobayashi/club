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
            'description' => 'テストお知らせ\nテストお知らせ\nテストお知らせ01',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => 'テストタイトル02',
            'description' => 'テストお知らせ\nテストお知らせ\nテストお知らせ02',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => 'テストタイトル03',
            'description' => 'テストお知らせ\nテストお知らせ\nテストお知らせ03',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
