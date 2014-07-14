<?php

class PaymentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        Payment::create([
            'applicant_id'  =>  1,
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  2,
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  3,
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  4,
            'price'         =>  500.00
        ]);

        Payment::create([
            'applicant_id'  =>  5,
            'price'         =>  500.00
        ]);
    }
}