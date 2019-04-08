<?php

use Illuminate\Database\Seeder;
use App\InstallGuide;

class InstallGuideTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\InstallGuide::class, 20)->create();
	}
}
