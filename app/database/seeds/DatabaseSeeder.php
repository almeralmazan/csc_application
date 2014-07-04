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

        $this->call('TestingCenterTableSeeder');
        $this->command->info('TestingCenter table seeded!');

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('RequirementTableSeeder');
        $this->command->info('Requirement table seeded!');

        $this->call('ApplicantTableSeeder');
        $this->command->info('Applicant table seeded!');

        $this->call('ScheduleTableSeeder');
        $this->command->info('Schedule table seeded!');
	}

}
