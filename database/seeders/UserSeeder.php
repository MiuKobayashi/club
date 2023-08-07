<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '部員A',
            'email' => 'ocha@a.com',
            'email_verified_at' => new DateTime(),
            'password' => 'ochamembera',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 3,
            'experience' => true,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => '部員B',
            'email' => 'ocha@b.com',
            'email_verified_at' => new DateTime(),
            'password' => 'ochamemberb',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 2,
            'experience' => false,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => '部員C',
            'email' => 'ocha@c.com',
            'email_verified_at' => new DateTime(),
            'password' => 'ochamemberc',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 1,
            'experience' => true,
            'admin' => false,
        ]);
    }
}
