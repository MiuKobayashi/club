<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            'name' => 'Ⅰ箏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => 'Ⅱ箏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => 'Ⅲ箏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => 'Ⅳ箏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => 'Ⅴ箏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => '17絃',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => '本手',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('parts')->insert([
            'name' => '替手',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
