<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'event_name' => '合奏練習',
            'start_date' => date('2023-10-05 10:00:00'),
            'end_date' => date('2023-10-05 20:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => '徽音祭',
            'start_date' => date('2023-11-12 00:00:00'),
            'end_date' => date('2023-11-13 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => '定期演奏会',
            'start_date' => date('2023-12-02 00:00:00'),
            'end_date' => date('2023-12-03 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-10-04 00:00:00'),
            'end_date' => date('2023-10-05 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-10-11 00:00:00'),
            'end_date' => date('2023-10-12 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-10-18 00:00:00'),
            'end_date' => date('2023-10-19 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-10-25 00:00:00'),
            'end_date' => date('2023-10-26 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 09:00:00'),
        //     'end_date' => date('2023-10-11 09:30:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 1
        // ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 09:40:00'),
        //     'end_date' => date('2023-10-11 10:10:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 2
        // ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 10:20:00'),
        //     'end_date' => date('2023-10-11 10:50:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 3
        // ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 11:00:00'),
        //     'end_date' => date('2023-10-11 11:30:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 4
        // ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 11:40:00'),
        //     'end_date' => date('2023-10-11 12:10:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 5
        // ]);
        // DB::table('schedules')->insert([
        //     'event_name' => 'お稽古',
        //     'start_date' => date('2023-10-11 12:20:00'),
        //     'end_date' => date('2023-10-11 12:50:00'),
        //     'created_at' => new DateTime(),
        //     'updated_at' => new DateTime(),
        //     'user_id' => 6
        // ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-11-01 00:00:00'),
            'end_date' => date('2023-11-02 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-11-08 00:00:00'),
            'end_date' => date('2023-11-09 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-11-15 00:00:00'),
            'end_date' => date('2023-11-16 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-11-22 00:00:00'),
            'end_date' => date('2023-11-23 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
