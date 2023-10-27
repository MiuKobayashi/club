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
            'url' => 'https://youtu.be/y7YH_5K1G6U?si=_R7NmdL_hhD4AmTd',
        ]);
        DB::table('songs')->insert([
            'name' => '花筏',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
            'url' => 'https://youtu.be/jXnjkr7WoFk?si=BfshCRBQv3Aw7uF7',
        ]);
        DB::table('songs')->insert([
            'name' => '飛躍',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
            'url' => 'https://youtu.be/90evCJHDB4A?si=dxRHOfPlhLA_ZnO6',
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
            'url' => 'https://youtu.be/KiLs48hp2Pk?si=BYYjXO0VNE5TNVIy',
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
            'url' => 'https://youtu.be/anGg7pqwb9Q?si=I026flVLRm0sBllL',
        ]);
        DB::table('songs')->insert([
            'name' => '光のしづく',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => FALSE,
            'url' => 'https://youtu.be/vUDC3sMMH_U?si=znJFM6BUm7jb4hxL',
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
            'url' => 'https://youtu.be/KnmY1bfdH9c',
        ]);
        DB::table('songs')->insert([
            'name' => '人生のメリーゴーランド',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
            'url' => 'https://youtu.be/LczZznH1yLY?si=a76DeUOb6kqW_x5n',
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
            'url' => 'https://youtu.be/Y_Db88Ef6FQ?si=lSw1my8xd5AFtb2e',
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
            'url' => 'https://youtu.be/ZtIYyRvozLk?si=hEtKEGVXuywbuYzo',
        ]);
        DB::table('songs')->insert([
            'name' => '花園',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'performance' => TRUE,
            'url' => 'https://youtu.be/ndMQ5E7Tu5U?si=U1A2g1BXseg03WpX',
        ]);
    }
}
