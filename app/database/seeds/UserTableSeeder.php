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
                   'name' => 'Džon', 
                   'surname' => 'Malkovič', 
                   'job_title' => 'Sales Manager',
                   'phone' => '+37167000001', 
                   'email' => 'inboxfortesting@gmail.com', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'Admin2', 
                   'name' => 'Second', 
                   'surname' => 'Admin', 
                   'job_title' => 'Staff manager',
                   'phone' => '+37167000001', 
                   'email' => 'inboxfortesting@gmail.com', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'User1', 
                   'name' => 'Bruce', 
                   'surname' => 'Almighty',
                   'job_title' => 'Sales Representative and technical support', 
                   'phone' => '+37167000002', 
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'User2', 
                   'name' => 'Edric', 
                   'surname' => 'Alpha',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002', 
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '0' 
                ));
                
                User::create(array(
                   'username' => 'User3', 
                   'name' => 'Vincent', 
                   'surname' => 'Odin',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002', 
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1' 
                ));
                
                User::create(array(
                   'username' => 'User4', 
                   'name' => 'Lewis', 
                   'surname' => 'Jaycob',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002', 
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1' 
                ));
	}

}
