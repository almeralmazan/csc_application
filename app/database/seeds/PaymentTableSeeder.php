<?php

class PaymentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        Payment::create([
            'applicant_id'  =>  1,
            'paid_date'     =>  '2014-07-05',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  2,
            'paid_date'     =>  '2014-07-03',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  3,
            'paid_date'     =>  '0000-00-00',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  4,
            'paid_date'     =>  '2014-07-22',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  5,
            'paid_date'     =>  '0000-00-00',
            'price'         =>  500.00
        ]);
    }
}