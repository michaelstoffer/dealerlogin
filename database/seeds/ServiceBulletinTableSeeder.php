<?php

use Illuminate\Database\Seeder;
use App\ServiceBulletin;

class ServiceBulletinTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\ServiceBulletin::class, 10)->create();
	}
}
