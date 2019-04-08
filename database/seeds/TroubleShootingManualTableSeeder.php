<?php

use Illuminate\Database\Seeder;

class TroubleShootingManualTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\TroubleShootingManual::class, 100)->create();
	}
}
