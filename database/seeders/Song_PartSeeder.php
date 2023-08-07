<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Song_PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs_parts')->insert([
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'song_id' => 2,
                'part_id' => 3,
        ]);
    }
}
