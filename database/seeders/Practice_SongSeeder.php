<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Practice_SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practice_songs')->insert([
                'ready' => TRUE,
                'performance' => TRUE,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'song_id' => 1,
                'user_id' => 1,
         ]);
         DB::table('practice_songs')->insert([
                'ready' => FALSE,
                'performance' => TRUE,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'song_id' => 2,
                'user_id' => 3,
         ]);
    }
}
