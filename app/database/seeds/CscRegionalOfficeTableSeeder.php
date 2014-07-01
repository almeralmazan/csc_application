<?php

class CscRegionalOfficeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('csc_regional_offices')->delete();

        $branches = [
            'CSC NCR - No. 25 Kaliraya St., Banawe Quezon City',
            'CSCRO 1 - Quezon Avenue., San Fernando City, La Union',
            'CSCRO 2 - San Gabriel, Tuguegarao, Cagayan',
            'CSCRO 3 - Diosdado Macapagal Government Center Maimpis, City of San Fernando, Pampanga',
            'CSCRO 4 - 139 Panay Avenue Brgy. South Triangle, Quezon City',
            'CSCRO 5 - Rawis, Legazpi City',
            'CSCRO 6 - No. 7 Onate St., Mandurriao, Iloilo City',
            'CSCRO 7 - Sudlon, Lahug, Cebu City',
            'CSCRO 8 - Government Center, Palo, Leyte',
            'CSCRO 9 - Cabatangan, Zamboanga City',
            'CSCRO 10 - Vamenta Blvd. Carmen, Cagayan de Oro City',
            'CSCRO 11 - Ecoland Drive cor. Beechnut St., Ecoland Subd. Davao City',
            'CSCRO 12 - Gov. Gutierrez Avenue, Cotabato City',
            'CSC CAR - No. 116 Wagner Road, Military Cut-Off Baguio City',
            'CSC CARAGA - Doongan Road, Butuan City',
            'CSC ARMM - ARMM ORG Compound, Cotabato City'
        ];

        foreach ($branches as $branch)
        {
            CscRegionalOffice::create([
                'branch'    =>  $branch
            ]);
        }
    }
}