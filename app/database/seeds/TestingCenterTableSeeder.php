<?php

class TestingCenterTableSeeder extends Seeder {

    public function run()
    {
        DB::table('testing_centers')->delete();

        $locations = [
            'Bangued', 'Bacolod City', 'Bacoor City', 'Baguio City', 'Batangas City', 'Bayombong',
            'Bongao, Tawi-tawi', 'Butuan City', 'Cabanatuan City', 'Cagayan de Oro City',
            'Catbalogan City', 'Cebu City', 'City of Malolos', 'City of San Fernando, Pampanga',
            'Cotabato City', 'Cotabato City', 'Dagupan City', 'Dasmarinas City', 'Davao City',
            'Dipolog City', 'Dumaguete City', 'Iligan City', 'Iloilo City', 'Kalibo, Aklan',
            'Kidapawan City', 'Koronadal City', 'Lagawe, Ifugao', 'Lamitan City', 'Legazpi City',
            'Lopez', 'Lucena City', 'Luna, Apayao', 'Maasin City', 'Manila', 'Masbate City',
            'Morong, Rizal', 'Naga City', 'Olongapo City', 'Pagadian City', 'Puerto Princesa City',
            'Quezon City', 'San Fernando City, La Union', 'Sta. Cruz Laguna', 'Surigao City',
            'Tacloban City', 'Tagbilaran City', 'Tagum City', 'Tandag City', 'Tuguegarao City',
            'Urdaneta City', 'Vigan City', 'Zamboanga City'
        ];

        foreach ($locations as $location)
        {
            TestingCenter::create([
                'location'  =>  $location
            ]);
        }
    }
}