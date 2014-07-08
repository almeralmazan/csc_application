<?php

class PaymentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        Payment::create([
            'applicant_id'  =>  1,
            'price'         =>  500.00
        ]);
    }
}