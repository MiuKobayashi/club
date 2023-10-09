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
            'title' => '今月のお稽古について',
            'description' => '今月のお稽古をカレンダーに登録しました。確認してください。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => '和室の使用について',
            'description' => '今月の1日〜５日は和室使用禁止期間になりました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('announcements')->insert([
            'title' => '明日のお稽古の部屋について',
            'description' => '明日は和室（小）から（大）に変更になりました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
