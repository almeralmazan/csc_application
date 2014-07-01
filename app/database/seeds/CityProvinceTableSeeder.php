<?php

class CityProvinceTableSeeder extends Seeder {

    public function run()
    {
        DB::table('cities_and_provinces')->delete();

        $cities_and_provinces = [
            'Abra', 'Agusan del Norte', 'Agusan del Sur', 'Aklan', 'Albay', 'Angeles City', 'Antique',
            'Aurora', 'Bacolod City', 'Bago City', 'Baguio City', 'Basilan', 'Bataan', 'Batanes',
            'Batangas', 'Batangas City', 'Benguet', 'Bohol', 'Bukidnon', 'Bulacan', 'Butuan City',
            'Cabanatuan City', 'Cadiz City', 'Cagayan', 'Cagayan de Oro City', 'Calbayog City',
            'Caloocan City', 'Camarines Norte', 'Camarines Sur', 'Camiguin', 'Canlaon City', 'Capiz',
            'Catanduanes', 'Cavite', 'Cavite City', 'Cebu', 'Cebu City', 'Cotabato City', 'Dagupan City',
            'Danao City', 'Dapitan City', 'Davao City', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental',
            'Dipolog City', 'Dumaguete City', 'Eastern Samar', 'General Santos City', 'Gingoog City',
            'Ifugao', 'Iligan City', 'Ilocos Norte', 'Ilocos Sur', 'Iloilo', 'Iloilo City', 'Iriga City',
            'Isabela', 'Kalinga-Apayao', 'La Carlota City', 'La Union', 'Laguna', 'Lanao del Norte',
            'Lanao del Sur', 'Laoag City', 'Lapu-Lapu City', 'Legaspi City', 'Leyte', 'Lipa City',
            'Lucena City', 'Maguindanao', 'Mandaue City', 'Manila City', 'Marawi City',
            'Marinduque', 'Masbate', 'Mindoro Occidental', 'Mindoro Oriental', 'Misamis Occidental',
            'Misamis Oriental', 'Mountain', 'Naga City', 'Negros Occidental', 'Negros Oriental',
            'North Cotabato', 'Northern Samar', 'Nueva Ecija', 'Nueva Vizcaya', 'Olongapo City',
            'Ormoc City', 'Oroquieta City', 'Ozamis City', 'Pagadian City', 'Palawan', 'Palayan City',
            'Pampanga', 'Pangasinan', 'Pasay City', 'Puerto Princesa City', 'Quezon', 'Quezon City',
            'Quirino', 'Rizal', 'Romblon', 'Roxas City', 'Samar', 'San Carlos City', 'San Pablo City',
            'Silay City', 'Siquijor', 'Sorsogon', 'South Cotabato', 'Southern Leyte', 'Sultan Kudarat',
            'Sulu', 'Surigao City', 'Surigao del Norte', 'Surigao del Sur', 'Tacloban City', 'Tagaytay City',
            'Tagbilaran City', 'Tangub City', 'Tarlac', 'Tawi-Tawi', 'Toledo City', 'Trece Martires City',
            'Zambales', 'Zamboanga City', 'Zamboanga del Norte', 'Zamboanga del Sur'
        ];

        foreach ($cities_and_provinces as $cp)
        {
            CityProvince::create([
                'name'  =>   $cp
            ]);
        }
    }
}