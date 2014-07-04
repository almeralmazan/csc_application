<?php

class ScheduleTestCenter extends Eloquent {

    protected $table = 'schedule_testcenter';

    public $timestamps = false;

    protected $fillable = ['schedule_id', 'testcenter_id'];
}