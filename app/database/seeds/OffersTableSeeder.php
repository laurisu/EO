<?php

class OffersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('offers')->delete();
        
		\DB::table('offers')->insert(array (
			0 => 
			array (
				'id' => 6,
				'user_id' => 1,
				'customer_id' => 43,
				'status' => 3,
				'created_at' => '2015-04-26 15:36:26',
				'updated_at' => '2015-05-03 17:41:09',
			),
			1 => 
			array (
				'id' => 8,
				'user_id' => 1,
				'customer_id' => 25,
				'status' => 1,
				'created_at' => '2015-04-26 16:13:27',
				'updated_at' => '2015-04-30 15:11:29',
			),
			2 => 
			array (
				'id' => 31,
				'user_id' => 1,
				'customer_id' => 87,
				'status' => 1,
				'created_at' => '2015-04-30 14:35:51',
				'updated_at' => '2015-04-30 14:36:33',
			),
			3 => 
			array (
				'id' => 32,
				'user_id' => 1,
				'customer_id' => 4,
				'status' => 1,
				'created_at' => '2015-04-30 14:47:12',
				'updated_at' => '2015-04-30 14:47:18',
			),
			4 => 
			array (
				'id' => 33,
				'user_id' => 1,
				'customer_id' => 102,
				'status' => 2,
				'created_at' => '2015-04-30 15:21:02',
				'updated_at' => '2015-04-30 15:21:23',
			),
			5 => 
			array (
				'id' => 34,
				'user_id' => 1,
				'customer_id' => 84,
				'status' => 4,
				'created_at' => '2015-04-30 15:23:36',
				'updated_at' => '2015-05-03 17:57:29',
			),
			6 => 
			array (
				'id' => 35,
				'user_id' => 1,
				'customer_id' => 4,
				'status' => 3,
				'created_at' => '2015-04-30 16:21:29',
				'updated_at' => '2015-05-03 17:58:26',
			),
			7 => 
			array (
				'id' => 36,
				'user_id' => 1,
				'customer_id' => 74,
				'status' => 1,
				'created_at' => '2015-05-01 11:01:34',
				'updated_at' => '2015-05-01 11:01:40',
			),
			8 => 
			array (
				'id' => 37,
				'user_id' => 1,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-05-01 12:44:20',
				'updated_at' => '2015-05-01 12:44:20',
			),
			9 => 
			array (
				'id' => 38,
				'user_id' => 1,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-05-01 13:06:53',
				'updated_at' => '2015-05-01 13:06:53',
			),
		));
	}

}
