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
            'name' => '三段の調',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '花筏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => '飛躍',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '夜空ノムコウ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => 'ハナミズキ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => 'わらべうたメドレー',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => '雪はな',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => '光のしづく',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => 'さくら（三重奏）',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => 'ちょうちょ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => 'いつも何度でも',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '人生のメリーゴーランド',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '地上の星',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '龍星群',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => '弦鳴',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
        DB::table('songs')->insert([
            'name' => 'Blue Legend',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
        ]);
        DB::table('songs')->insert([
            'name' => '花園',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
        ]);
    }
}
