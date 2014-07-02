<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'username'  =>  'admin',
            'password'  =>  Hash::make('admin'),
            'role'      =>  'admin'
        ]);

        User::create([
            'username'  =>  'processor',
            'password'  =>  Hash::make('processor'),
            'role'      =>  'processor'
        ]);
    }

}
