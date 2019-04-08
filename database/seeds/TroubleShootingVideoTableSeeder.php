<?php

use Illuminate\Database\Seeder;

class TroubleShootingVideoTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\TroubleShootingVideo::class, 100)->create();
	}
}
