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
    }
}
