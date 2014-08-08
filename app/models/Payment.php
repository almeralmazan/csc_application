<?php

class Payment extends Eloquent {

    protected $fillable = ['applicant_id', 'price', 'reserved_date', 'paid_date'];
}