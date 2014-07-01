<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('CityProvinceTableSeeder');
        $this->command->info('CityProvince table seeded!');

        $this->call('CscRegionalOfficeTableSeeder');
        $this->command->info('CscRegionalOffice table seeded!');

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
	}

}
