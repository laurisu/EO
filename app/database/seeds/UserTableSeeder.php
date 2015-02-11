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
                   'name' => 'John', 
                   'surname' => 'Malkovič', 
                   'job_title' => 'Sales Manager',
                   'phone' => '+37167000001', 
                   'email' => 'admin@eo.zz', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'User', 
                   'name' => 'Bruce', 
                   'surname' => 'Almighty',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002', 
                   'email' => 'user1@eo.zz',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1' 
                ));
	}

}
