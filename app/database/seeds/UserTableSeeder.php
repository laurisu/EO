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
                   'img' => 'img/uploads/user1.jpg', 
                   'email' => 'inboxfortesting@gmail.com', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s') 
                ));
                
                User::create(array(
                   'username' => 'Admin2', 
                   'name' => 'Second', 
                   'surname' => 'Admin', 
                   'job_title' => 'Staff manager',
                   'phone' => '+37167000001', 
                   'img' => 'img/uploads/user2.jpg',
                   'email' => 'inboxfortesting@gmail.com', 
                   'password' => Hash::make('123456'),
                   'role' => '2', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s') 
                ));
                
                User::create(array(
                   'username' => 'User1', 
                   'name' => 'Bruce', 
                   'surname' => 'Almighty',
                   'job_title' => 'Sales Representative and technical support', 
                   'phone' => '+37167000002',
                   'img' => 'img/uploads/user3.jpg',
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s')  
                ));
                
                User::create(array(
                   'username' => 'User2', 
                   'name' => 'Edric', 
                   'surname' => 'Alpha',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002',
                   'img' => 'img/uploads/user4.jpg',
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s')  
                ));
                
                User::create(array(
                   'username' => 'User3', 
                   'name' => 'Vincent', 
                   'surname' => 'Odin',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002',
                   'img' => 'img/uploads/user5.jpg',
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s')  
                ));
                
                User::create(array(
                   'username' => 'User4', 
                   'name' => 'Natalia', 
                   'surname' => 'Jaycob',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002',
                   'img' => 'img/uploads/user6.jpg',
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s')  
                ));
                
                User::create(array(
                   'username' => 'User7', 
                   'name' => 'Matt', 
                   'surname' => 'Conor',
                   'job_title' => 'Sales Representative', 
                   'phone' => '+37167000002',
                   'img' => 'img/uploads/user7.jpg',
                   'email' => 'inboxfortesting@gmail.com',  
                   'password' => Hash::make('123456'),
                   'role' => '0', 
                   'active' => '1',
                   'last_signin' => date('Y-m-d H:i:s')  
                ));
	}

}
