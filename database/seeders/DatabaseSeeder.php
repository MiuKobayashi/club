<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(SongSeeder::class);
        //$this->call(Practice_SongSeeder::class);
        $this->call(Song_PartSeeder::class);
    }
}
