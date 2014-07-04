<?php

class ScheduleTestCenterTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schedule_testcenter')->delete();

        ScheduleTestCenter::create([
            'schedule_id'   =>  1,
            'testcenter_id' =>  1
        ]);

        ScheduleTestCenter::create([
            'schedule_id'   =>  1,
            'testcenter_id' =>  2
        ]);

        ScheduleTestCenter::create([
            'schedule_id'   =>  1,
            'testcenter_id' =>  3
        ]);

        ScheduleTestCenter::create([
            'schedule_id'   =>  2,
            'testcenter_id' =>  1
        ]);

        ScheduleTestCenter::create([
            'schedule_id'   =>  2,
            'testcenter_id' =>  2
        ]);

        ScheduleTestCenter::create([
            'schedule_id'   =>  3,
            'testcenter_id' =>  1
        ]);
    }
}