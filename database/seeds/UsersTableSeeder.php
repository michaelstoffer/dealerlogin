<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'dealer_id' => 1792,
			'first_name' => 'Michael',
			'last_name' => 'Stoffer',
			'email' => 'mstoffer@intechtrailers.com',
			'password' => bcrypt('Nog33575'),
			'email_verified_at' => now()
		]);

		DB::table('users')->insert([
			'dealer_id' => 1792,
			'first_name' => 'Adam',
			'last_name' => 'Maxwell',
			'email' => 'amaxwell@intechtrailers.com',
			'password' => bcrypt('Nog33575'),
			'email_verified_at' => now()
		]);

		DB::table('users')->insert([
			'dealer_id' => 1792,
			'first_name' => 'Keith',
			'last_name' => 'Fishburn',
			'email' => 'keith@intechrv.com',
			'password' => bcrypt('Nog33575'),
			'email_verified_at' => now()
		]);

		DB::table('users')->insert([
			'dealer_id' => 1792,
			'first_name' => 'Breanne',
			'last_name' => 'Judson',
			'email' => 'service@intechrv.com',
			'password' => bcrypt('Yul63045'),
			'email_verified_at' => now()
		]);
	}
}
