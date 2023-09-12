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
            'start_date' => date('2023-09-04 10:00:00'),
            'end_date' => date('2023-09-04 20:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
