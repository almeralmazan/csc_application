<?php

class PaymentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        Payment::create([
            'applicant_id'  =>  1,
            'reserved_date' =>  '2014-07-03',
            'paid_date'     =>  '2014-07-05',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  2,
            'reserved_date' =>  '2014-07-03',
            'paid_date'     =>  '2014-07-03',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  3,
            'reserved_date' =>  '2014-07-13',
            'paid_date'     =>  '0000-00-00',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  4,
            'reserved_date' =>  '2014-07-20',
            'paid_date'     =>  '2014-07-22',
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  5,
            'reserved_date' =>  '2014-07-25',
            'paid_date'     =>  '0000-00-00',
            'price'         =>  500.00
        ]);
    }
}