<?php

class Schedule extends Eloquent {

    protected $guarded = [];

    public static function getAllSchedules()
    {
        $result = DB::table('schedules')
                    ->join('testing_centers', 'testing_centers.id', '=', 'schedules.testing_center_id')
                    ->select(
                        'testing_centers.location',
                        'schedules.id',
                        'schedules.testing_center_id',
                        'schedules.date_start',
                        'schedules.time_start',
                        'schedules.time_end'
                    )
                    ->orderBy('testing_centers.location')
                    ->get();

        return $result;
    }
}