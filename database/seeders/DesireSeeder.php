<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DesireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('16:30'),
                'user_id' => 1,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('12:20'),
                'end_time' => date('13:10'),
                'user_id' => 2,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('9:00'),
                'end_time' => date('10:30'),
                'user_id' => 2,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('13:20'),
                'end_time' => date('19:00'),
                'user_id' => 3,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => '早い時間がいいです',
         ]);
                 DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('16:30'),
                'user_id' => 4,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('15:00'),
                'end_time' => date('20:00'),
                'user_id' => 5,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('16:40'),
                'end_time' => date('18:10'),
                'user_id' => 6,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('10:30'),
                'user_id' => 6,
                'schedule_id' => 8,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('14:50'),
                'user_id' => 1,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('16:40'),
                'end_time' => date('18:10'),
                'user_id' => 1,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('19:00'),
                'end_time' => date('20:00'),
                'user_id' => 2,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('19:00'),
                'user_id' => 3,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => '早い時間がいいです',
         ]);
        DB::table('desires')->insert([
                'start_time' => date('12:20'),
                'end_time' => date('13:10'),
                'user_id' => 4,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('15:00'),
                'end_time' => date('20:00'),
                'user_id' => 5,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('16:40'),
                'end_time' => date('18:10'),
                'user_id' => 6,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('12:10'),
                'user_id' => 6,
                'schedule_id' => 9,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('18:10'),
                'user_id' => 1,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('13:20'),
                'end_time' => date('16:30'),
                'user_id' => 2,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('12:10'),
                'user_id' => 2,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('20:00'),
                'user_id' => 3,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => '早い時間がいいです',
         ]);
                 DB::table('desires')->insert([
                'start_time' => date('15:00'),
                'end_time' => date('20:00'),
                'user_id' => 4,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('15:00'),
                'end_time' => date('20:00'),
                'user_id' => 5,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('14:50'),
                'user_id' => 6,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('16:40'),
                'end_time' => date('18:10'),
                'user_id' => 6,
                'schedule_id' => 10,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('14:50'),
                'user_id' => 1,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('09:00'),
                'end_time' => date('16:30'),
                'user_id' => 2,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('12:20'),
                'end_time' => date('13:10'),
                'user_id' => 3,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('15:00'),
                'end_time' => date('19:00'),
                'user_id' => 3,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => '早い時間がいいです',
         ]);
                 DB::table('desires')->insert([
                'start_time' => date('12:20'),
                'end_time' => date('16:30'),
                'user_id' => 4,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('16:40'),
                'end_time' => date('19:00'),
                'user_id' => 5,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'remarks' => 'バイトのため',
         ]);
         DB::table('desires')->insert([
                'start_time' => date('10:40'),
                'end_time' => date('12:10'),
                'user_id' => 6,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         DB::table('desires')->insert([
                'start_time' => date('19:00'),
                'end_time' => date('20:00'),
                'user_id' => 6,
                'schedule_id' => 11,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
