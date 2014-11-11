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
                
                User::create(array(
                   'username' => 'Admin', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'User', 
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1' 
                ));
	}

}
