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
	}

}
