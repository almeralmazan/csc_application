<?php

class ScheduleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schedules')->delete();

        $dt = \Carbon\Carbon::create(2014, 6, 1, 7, 0, 0);

        Schedule::create([
            'date_start'    =>  $dt->addDays(2)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);

        Schedule::create([
            'date_start'    =>  $dt->addDays(4)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);

        Schedule::create([
            'date_start'    =>  $dt->addDays(6)->toDateString(),
            'time_start'    =>  $dt->addHours(1)->toTimeString(),
            'time_end'      =>  $dt->addHours(2)->toTimeString()
        ]);
    }
}