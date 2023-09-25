<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'name' => Str::random(10),
            'email' => Str::random(10).'@edu.cc.ocha.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 3,
            'experience' => true,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@edu.cc.ocha.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 2,
            'experience' => false,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@edu.cc.ocha.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 1,
            'experience' => true,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@edu.cc.ocha.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 3,
            'experience' => false,
            'admin' => false,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@edu.cc.ocha.ac.jp',
            'email_verified_at' => new DateTime(),
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'year' => 2,
            'experience' => false,
            'admin' => false,
        ]);
    }
}
