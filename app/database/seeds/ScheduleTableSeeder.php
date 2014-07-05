<?php

class ScheduleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schedules')->delete();

        $first_row = \Carbon\Carbon::create(2014, 7, 10, 8, 0, 0);

        Schedule::create([
            'testing_center_id' =>  6,
            'date_start'        =>  $first_row->toDateString(),
            'time_start'        =>  $first_row->toTimeString(),
            'time_end'          =>  $first_row->addHours(2)->toTimeString()
        ]);

        Schedule::create([
            'testing_center_id' =>  1,
            'date_start'        =>  $first_row->addDay()->toDateString(),
            'time_start'        =>  $first_row->addHour()->toTimeString(),
            'time_end'          =>  $first_row->addHours(2)->toTimeString()
        ]);
        Schedule::create([
            'testing_center_id' =>  1,
            'date_start'        =>  $first_row->addDays(3)->toDateString(),
            'time_start'        =>  $first_row->addHours(3)->toTimeString(),
            'time_end'          =>  $first_row->addHours(5)->toTimeString()
        ]);
        Schedule::create([
            'testing_center_id' =>  2,
            'date_start'        =>  $first_row->addDays(4)->toDateString(),
            'time_start'        =>  $first_row->addHours(5)->toTimeString(),
            'time_end'          =>  $first_row->addHours(7)->toTimeString()
        ]);
        Schedule::create([
            'testing_center_id' =>  2,
            'date_start'        =>  $first_row->addDays(5)->toDateString(),
            'time_start'        =>  $first_row->addHours(1)->toTimeString(),
            'time_end'          =>  $first_row->addHours(2)->toTimeString()
        ]);
        Schedule::create([
            'testing_center_id' =>  4,
            'date_start'        =>  $first_row->addDays(7)->toDateString(),
            'time_start'        =>  $first_row->addHours(1)->toTimeString(),
            'time_end'          =>  $first_row->addHours(2)->toTimeString()
        ]);

        $dt = \Carbon\Carbon::create(2014, 6, 1, 7, 0, 0);

        Schedule::create([
            'testing_center_id' =>  6,
            'date_start'    =>  $dt->addDays(2)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);

        Schedule::create([
            'testing_center_id' =>  2,
            'date_start'    =>  $dt->addDays(4)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);

        Schedule::create([
            'testing_center_id' =>  3,
            'date_start'    =>  $dt->addDays(6)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);
    }
}