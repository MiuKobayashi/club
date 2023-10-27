<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
        for($i=1; $i<9; $i++) {
            $name = "user" . $i;
            $$name = User::find($i);
        }
        
        //活動日
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
        
        //10月のお稽古
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
        
        //10月の希望時間
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-10-11 09:00:00'),
            'end_date' => date('2023-10-11 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user3->name,
            'start_date' => date('2023-10-11 09:40:00'),
            'end_date' => date('2023-10-11 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 3
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-10-11 10:20:00'),
            'end_date' => date('2023-10-11 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-10-11 11:00:00'),
            'end_date' => date('2023-10-11 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user6->name,
            'start_date' => date('2023-10-11 11:40:00'),
            'end_date' => date('2023-10-11 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 6
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user7->name,
            'start_date' => date('2023-10-11 12:20:00'),
            'end_date' => date('2023-10-11 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-10-11 13:00:00'),
            'end_date' => date('2023-10-11 13:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-10-18 09:00:00'),
            'end_date' => date('2023-10-18 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-10-18 09:40:00'),
            'end_date' => date('2023-10-18 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-10-18 10:20:00'),
            'end_date' => date('2023-10-18 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user6->name,
            'start_date' => date('2023-10-18 11:00:00'),
            'end_date' => date('2023-10-18 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 6
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user7->name,
            'start_date' => date('2023-10-18 11:40:00'),
            'end_date' => date('2023-10-18 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-10-18 12:20:00'),
            'end_date' => date('2023-10-18 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 8
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-10-25 09:00:00'),
            'end_date' => date('2023-10-25 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user2->name,
            'start_date' => date('2023-10-25 09:40:00'),
            'end_date' => date('2023-10-25 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 2
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user3->name,
            'start_date' => date('2023-10-25 10:20:00'),
            'end_date' => date('2023-10-25 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 3
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-10-25 11:00:00'),
            'end_date' => date('2023-10-25 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-10-25 11:40:00'),
            'end_date' => date('2023-10-25 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-10-25 12:20:00'),
            'end_date' => date('2023-10-25 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 8
        ]);
        
        //11月のお稽古順
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
        
        //11月のお稽古順
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-11-01 09:00:00'),
            'end_date' => date('2023-11-01 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user3->name,
            'start_date' => date('2023-11-01 09:40:00'),
            'end_date' => date('2023-11-01 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 3
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-11-01 10:20:00'),
            'end_date' => date('2023-11-01 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-11-01 11:00:00'),
            'end_date' => date('2023-11-01 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user6->name,
            'start_date' => date('2023-11-01 11:40:00'),
            'end_date' => date('2023-11-01 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 6
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user7->name,
            'start_date' => date('2023-11-01 12:20:00'),
            'end_date' => date('2023-11-01 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-11-08 09:00:00'),
            'end_date' => date('2023-11-08 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-11-08 09:40:00'),
            'end_date' => date('2023-11-08 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-11-08 10:20:00'),
            'end_date' => date('2023-11-08 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user6->name,
            'start_date' => date('2023-11-08 11:00:00'),
            'end_date' => date('2023-11-08 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 6
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user7->name,
            'start_date' => date('2023-11-08 11:40:00'),
            'end_date' => date('2023-11-08 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-11-08 12:20:00'),
            'end_date' => date('2023-11-08 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 8
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-11-15 09:00:00'),
            'end_date' => date('2023-11-15 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user2->name,
            'start_date' => date('2023-11-15 09:40:00'),
            'end_date' => date('2023-11-15 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 2
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user3->name,
            'start_date' => date('2023-11-15 10:20:00'),
            'end_date' => date('2023-11-15 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 3
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-11-15 11:00:00'),
            'end_date' => date('2023-11-15 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-11-15 11:40:00'),
            'end_date' => date('2023-11-15 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-11-15 12:20:00'),
            'end_date' => date('2023-11-15 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 8
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user1->name,
            'start_date' => date('2023-11-22 09:00:00'),
            'end_date' => date('2023-11-22 09:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user4->name,
            'start_date' => date('2023-11-22 09:40:00'),
            'end_date' => date('2023-11-22 10:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 4
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user5->name,
            'start_date' => date('2023-11-22 10:20:00'),
            'end_date' => date('2023-11-22 10:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 5
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user6->name,
            'start_date' => date('2023-11-22 11:00:00'),
            'end_date' => date('2023-11-22 11:30:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 6
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user7->name,
            'start_date' => date('2023-11-22 11:40:00'),
            'end_date' => date('2023-11-22 12:10:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 7
        ]);
        DB::table('schedules')->insert([
            'event_name' => $user8->name,
            'start_date' => date('2023-11-22 12:20:00'),
            'end_date' => date('2023-11-22 12:50:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 8
        ]);
        
        //12月のお稽古順
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-12-07 00:00:00'),
            'end_date' => date('2023-12-08 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-12-13 00:00:00'),
            'end_date' => date('2023-12-14 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('schedules')->insert([
            'event_name' => 'お稽古',
            'start_date' => date('2023-12-20 00:00:00'),
            'end_date' => date('2023-12-21 00:00:00'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
