<?php

class PaymentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        Payment::create([
            'applicant_id'          =>  1,
            'transaction_number'    =>  'EC-9CU21348NC477050L',
            'reserved_date'         =>  '2014-07-03',
            'paid_date'             =>  '2014-07-05',
            'price'                 =>  500.00
        ]);

        Payment::create([
            'applicant_id'          =>  2,
            'transaction_number'    =>  'EC-8G093800L2678831S',
            'reserved_date'         =>  '2014-07-03',
            'paid_date'             =>  '2014-07-03',
            'price'                 =>  500.00
        ]);

        Payment::create([
            'applicant_id'          =>  3,
            'transaction_number'    =>  '',
            'reserved_date'         =>  '2014-07-13',
            'paid_date'             =>  '0000-00-00',
            'price'                 =>  500.00
        ]);

        Payment::create([
            'applicant_id'          =>  4,
            'transaction_number'    =>  'EC-3S266422EA944812S',
            'reserved_date'         =>  '2014-07-20',
            'paid_date'             =>  '2014-07-22',
            'price'                 =>  500.00
        ]);

        Payment::create([
            'applicant_id'          =>  5,
            'transaction_number'    =>  '',
            'reserved_date'         =>  '2014-07-25',
            'paid_date'             =>  '0000-00-00',
            'price'                 =>  500.00
        ]);
    }
}