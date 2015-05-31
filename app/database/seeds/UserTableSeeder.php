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
                   'username' => 'Admin1', 
                   'name' => 'Admin', 
                   'surname' => 'First', 
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
                   'name' => 'Admin', 
                   'surname' => 'Second', 
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
                   'name' => 'User', 
                   'surname' => 'First',
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
                   'name' => 'User', 
                   'surname' => 'Second',
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
                   'name' => 'User', 
                   'surname' => 'Third',
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
                   'name' => 'User', 
                   'surname' => 'Fourth',
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
                   'username' => 'User5', 
                   'name' => 'User', 
                   'surname' => 'Fifth',
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
