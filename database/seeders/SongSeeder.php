<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            'name' => '龍星群',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('songs')->insert([
            'name' => 'Blue Legend',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
