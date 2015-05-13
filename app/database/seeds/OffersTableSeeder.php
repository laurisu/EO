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
			10 => 
			array (
				'id' => 39,
				'user_id' => 2,
				'customer_id' => 8,
				'status' => 0,
				'created_at' => '2015-05-01 00:00:00',
				'updated_at' => '2015-05-03 00:00:00',
			),
			11 => 
			array (
				'id' => 40,
				'user_id' => 2,
				'customer_id' => 13,
				'status' => 0,
				'created_at' => '2015-04-28 00:00:00',
				'updated_at' => '2015-04-29 00:00:00',
			),
			12 => 
			array (
				'id' => 41,
				'user_id' => 2,
				'customer_id' => 20,
				'status' => 1,
				'created_at' => '2015-05-03 00:00:00',
				'updated_at' => '2015-05-04 00:00:00',
			),
			13 => 
			array (
				'id' => 42,
				'user_id' => 2,
				'customer_id' => 39,
				'status' => 2,
				'created_at' => '2015-04-01 00:00:00',
				'updated_at' => '2015-05-05 00:00:00',
			),
			14 => 
			array (
				'id' => 43,
				'user_id' => 2,
				'customer_id' => 42,
				'status' => 3,
				'created_at' => '2015-05-04 00:00:00',
				'updated_at' => '2015-05-07 00:00:00',
			),
			15 => 
			array (
				'id' => 44,
				'user_id' => 2,
				'customer_id' => 59,
				'status' => 4,
				'created_at' => '2015-05-04 00:00:00',
				'updated_at' => '2015-05-07 00:00:00',
			),
			16 => 
			array (
				'id' => 45,
				'user_id' => 2,
				'customer_id' => 60,
				'status' => 2,
				'created_at' => '2015-05-05 00:00:00',
				'updated_at' => '2015-05-05 00:00:00',
			),
			17 => 
			array (
				'id' => 46,
				'user_id' => 2,
				'customer_id' => 63,
				'status' => 1,
				'created_at' => '2015-05-02 00:00:00',
				'updated_at' => '2015-05-03 00:00:00',
			),
			18 => 
			array (
				'id' => 47,
				'user_id' => 3,
				'customer_id' => 4,
				'status' => 1,
				'created_at' => '2015-05-06 00:00:00',
				'updated_at' => '2015-05-05 21:21:34',
			),
			19 => 
			array (
				'id' => 48,
				'user_id' => 3,
				'customer_id' => 16,
				'status' => 1,
				'created_at' => '2015-05-03 00:00:00',
				'updated_at' => '2015-05-05 21:21:17',
			),
			20 => 
			array (
				'id' => 49,
				'user_id' => 3,
				'customer_id' => 25,
				'status' => 2,
				'created_at' => '2015-05-05 21:16:33',
				'updated_at' => '2015-05-05 21:17:09',
			),
			21 => 
			array (
				'id' => 50,
				'user_id' => 3,
				'customer_id' => 27,
				'status' => 2,
				'created_at' => '2015-05-05 21:17:42',
				'updated_at' => '2015-05-05 21:18:24',
			),
			22 => 
			array (
				'id' => 51,
				'user_id' => 3,
				'customer_id' => 32,
				'status' => 1,
				'created_at' => '2015-05-05 21:19:53',
				'updated_at' => '2015-05-05 21:20:05',
			),
			23 => 
			array (
				'id' => 52,
				'user_id' => 3,
				'customer_id' => 33,
				'status' => 3,
				'created_at' => '2015-05-05 21:22:17',
				'updated_at' => '2015-05-05 21:23:27',
			),
			24 => 
			array (
				'id' => 53,
				'user_id' => 3,
				'customer_id' => 38,
				'status' => 1,
				'created_at' => '2015-05-05 21:24:05',
				'updated_at' => '2015-05-05 21:24:13',
			),
			25 => 
			array (
				'id' => 54,
				'user_id' => 3,
				'customer_id' => 43,
				'status' => 1,
				'created_at' => '2015-05-05 21:24:32',
				'updated_at' => '2015-05-05 21:24:38',
			),
			26 => 
			array (
				'id' => 55,
				'user_id' => 3,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-05-05 21:29:21',
				'updated_at' => '2015-05-05 21:29:21',
			),
			27 => 
			array (
				'id' => 56,
				'user_id' => 4,
				'customer_id' => 7,
				'status' => 2,
				'created_at' => '2015-05-05 21:30:49',
				'updated_at' => '2015-05-05 21:31:06',
			),
			28 => 
			array (
				'id' => 57,
				'user_id' => 4,
				'customer_id' => 15,
				'status' => 1,
				'created_at' => '2015-05-05 21:33:17',
				'updated_at' => '2015-05-05 21:33:27',
			),
			29 => 
			array (
				'id' => 58,
				'user_id' => 4,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-05-05 21:33:44',
				'updated_at' => '2015-05-05 21:33:44',
			),
			30 => 
			array (
				'id' => 59,
				'user_id' => 4,
				'customer_id' => 22,
				'status' => 1,
				'created_at' => '2015-05-05 21:36:16',
				'updated_at' => '2015-05-05 21:36:24',
			),
			31 => 
			array (
				'id' => 60,
				'user_id' => 4,
				'customer_id' => 24,
				'status' => 4,
				'created_at' => '2015-05-05 21:37:25',
				'updated_at' => '2015-05-05 21:38:13',
			),
			32 => 
			array (
				'id' => 61,
				'user_id' => 4,
				'customer_id' => 30,
				'status' => 2,
				'created_at' => '2015-05-05 21:38:40',
				'updated_at' => '2015-05-05 21:39:03',
			),
			33 => 
			array (
				'id' => 62,
				'user_id' => 4,
				'customer_id' => 37,
				'status' => 2,
				'created_at' => '2015-05-05 21:41:13',
				'updated_at' => '2015-05-05 21:42:20',
			),
		));
	}

}
