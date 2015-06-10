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
				'updated_at' => '2015-06-03 15:11:29',
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
				'status' => 2,
				'created_at' => '2015-01-20 14:47:12',
				'updated_at' => '2015-01-30 16:51:37',
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
				'status' => 3,
				'created_at' => '2015-02-01 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
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
				'created_at' => '2015-02-06 00:00:00',
				'updated_at' => '2015-02-05 21:21:34',
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
				'status' => 3,
				'created_at' => '2015-01-05 21:16:33',
				'updated_at' => '2015-05-30 16:52:03',
			),
			21 => 
			array (
				'id' => 50,
				'user_id' => 3,
				'customer_id' => 27,
				'status' => 2,
				'created_at' => '2015-05-05 21:17:42',
				'updated_at' => '2015-06-05 21:18:24',
			),
			22 => 
			array (
				'id' => 51,
				'user_id' => 3,
				'customer_id' => 32,
				'status' => 2,
				'created_at' => '2015-03-05 21:19:53',
				'updated_at' => '2015-03-30 16:51:27',
			),
			23 => 
			array (
				'id' => 52,
				'user_id' => 3,
				'customer_id' => 33,
				'status' => 3,
				'created_at' => '2015-03-05 21:22:17',
				'updated_at' => '2015-03-05 21:23:27',
			),
			24 => 
			array (
				'id' => 53,
				'user_id' => 3,
				'customer_id' => 38,
				'status' => 3,
				'created_at' => '2015-05-05 21:24:05',
				'updated_at' => '2015-05-30 16:51:52',
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
				'customer_id' => 92,
				'status' => 2,
				'created_at' => '2015-03-01 21:29:21',
				'updated_at' => '2015-03-30 16:50:47',
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
				'created_at' => '2015-04-05 21:33:17',
				'updated_at' => '2015-04-05 21:33:27',
			),
			29 => 
			array (
				'id' => 58,
				'user_id' => 4,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-01-05 21:33:44',
				'updated_at' => '2015-01-05 21:33:44',
			),
			30 => 
			array (
				'id' => 59,
				'user_id' => 4,
				'customer_id' => 22,
				'status' => 1,
				'created_at' => '2015-04-05 21:36:16',
				'updated_at' => '2015-04-05 21:36:24',
			),
			31 => 
			array (
				'id' => 60,
				'user_id' => 4,
				'customer_id' => 24,
				'status' => 4,
				'created_at' => '2015-01-05 21:37:25',
				'updated_at' => '2015-01-05 21:38:13',
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
				'status' => 4,
				'created_at' => '2015-02-05 21:41:13',
				'updated_at' => '2015-02-25 16:52:16',
			),
			34 => 
			array (
				'id' => 63,
				'user_id' => 6,
				'customer_id' => 18,
				'status' => 1,
				'created_at' => '2015-01-30 16:40:37',
				'updated_at' => '2015-01-30 16:40:43',
			),
			35 => 
			array (
				'id' => 64,
				'user_id' => 6,
				'customer_id' => 35,
				'status' => 2,
				'created_at' => '2015-02-10 16:41:23',
				'updated_at' => '2015-02-10 16:41:38',
			),
			36 => 
			array (
				'id' => 65,
				'user_id' => 6,
				'customer_id' => 49,
				'status' => 3,
				'created_at' => '2015-03-10 16:42:34',
				'updated_at' => '2015-03-10 16:43:32',
			),
			37 => 
			array (
				'id' => 66,
				'user_id' => 6,
				'customer_id' => 2,
				'status' => 4,
				'created_at' => '2015-04-19 16:43:09',
				'updated_at' => '2015-04-19 16:43:36',
			),
			38 => 
			array (
				'id' => 67,
				'user_id' => 6,
				'customer_id' => 50,
				'status' => 2,
				'created_at' => '2015-05-30 16:43:57',
				'updated_at' => '2015-05-30 16:45:53',
			),
			39 => 
			array (
				'id' => 68,
				'user_id' => 6,
				'customer_id' => 86,
				'status' => 2,
				'created_at' => '2015-04-18 16:45:32',
				'updated_at' => '2015-04-19 16:45:44',
			),
			40 => 
			array (
				'id' => 69,
				'user_id' => 2,
				'customer_id' => 20,
				'status' => 2,
				'created_at' => '2015-04-30 16:48:53',
				'updated_at' => '2015-04-30 16:49:12',
			),
			41 => 
			array (
				'id' => 70,
				'user_id' => 2,
				'customer_id' => 8,
				'status' => 2,
				'created_at' => '2015-05-30 16:49:40',
				'updated_at' => '2015-06-02 16:49:54',
			),
			42 => 
			array (
				'id' => 71,
				'user_id' => 1,
				'customer_id' => 84,
				'status' => 1,
				'created_at' => '2015-05-30 19:40:03',
				'updated_at' => '2015-05-30 19:41:22',
			),
			43 => 
			array (
				'id' => 72,
				'user_id' => 1,
				'customer_id' => 35,
				'status' => 1,
				'created_at' => '2015-05-31 13:21:56',
				'updated_at' => '2015-05-31 13:22:22',
			),
			44 => 
			array (
				'id' => 73,
				'user_id' => 1,
				'customer_id' => NULL,
				'status' => 0,
				'created_at' => '2015-06-10 20:30:59',
				'updated_at' => '2015-06-10 20:30:59',
			),
		));
	}

}
