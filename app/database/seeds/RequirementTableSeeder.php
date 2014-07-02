<?php

class RequirementTableSeeder extends Seeder {

    public function run()
    {
        DB::table('requirements')->delete();

        $requirements = [
            'Barangay ID',
            'BIR ID',
            'Current Company/Office ID',
            'Current School ID',
            "Driver's License",
            'GSIS ID',
            'Police Clearance',
            'Postal ID',
            'SSS ID',
            'Valid Passposrt',
            "Voter's ID"
        ];

        foreach ($requirements as $requirement)
        {
            Requirement::create([
                'type'  =>  $requirement
            ]);
        }
    }
}